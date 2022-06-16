<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        $address = Address::with('user')
                    ->join('users', 'addresses.user_id', '=', 'users.id')
                    ->select('addresses.*', 'users.email as email')
                    ->where('user_id', auth()->user()->id)
                    ->where('addresses.main_address', 1)
                    ->orderBy('addresses.updated_at', 'desc')
                    ->take(1)
                    ->get();
        $old_cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        foreach ($old_cartItem as $item) {
            if (!Product::where('id', $item->product_id)->where('stoke', '>=', $item->product_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        return view('pages.checkout.index', compact('cartItem', 'address'));
    }

    public function placeOrder(Request $request)
    {
        
        $order = new Order();
        $order->user_id = auth()->user()->id;

        $address = Address::with('user')
                    ->join('users', 'addresses.user_id', '=', 'users.id')
                    ->select('addresses.*', 'users.email as email')
                    ->where('user_id', auth()->user()->id)
                    ->where('addresses.main_address', 1)
                    ->orderBy('addresses.updated_at', 'desc')
                    ->take(1)
                    ->get();
        foreach ($address as $address) {
            $order->address_id = $address->id;
        }

        $total = 0;
        $cartItem_total = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        foreach ($cartItem_total as $product_total) {
            $total += $product_total->product->price * $product_total->product_qty;
        }
        $order->total_price = $total;
        $order->message = 'Pesanan anda berhasil dibuat';
        $order->tracking_no = 'TaniKula'.rand(1111111111, 9999999999);
        $order->save();

        $cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        foreach ($cartItem as $item) {
            OrderItem::create([
                'order_id'=> $order->id,
                'product_id'=> $item->product_id,
                'qty'=> $item->product_qty,
                'price'=> $item->product->price,
            ]);

            $prod = Product::where('id', $item->product_id)->first();
            $prod->stoke = $prod->stoke - $item->product_qty;
            $prod->update();
        }

        $cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        Cart::destroy($cartItem);

        return redirect('/')->with('status', 'Berhasil Membuat Pesanan');

    }

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Address::with('user')
                    ->join('users', 'addresses.user_id', '=', 'users.id')
                    ->select('addresses.*', 'users.email as email')
                    ->where('user_id', auth()->user()->id)
                    ->orderBy('addresses.main_address', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			foreach ($emps as $emp) {
				$output .= '
                <div class="body mt-2 border border-success">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div>';
                            if ($emp->main_address == 1) {
                                $output .= '<p class="fw-bold text-black mb-2">' . $emp->recipients_name .'
                                    <span class="fw-normal">('.$emp->address_label.') </span>
                                    <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                    </svg>
                                </p>';
                            } else if($emp->main_address == 0) {
                                $output .= '<p class="fw-bold text-black mb-2">' . $emp->recipients_name .'
                                    <span class="fw-normal">('.$emp->address_label.') </span>
                                </p>';
                            }
                            $output .= '</div>
                            <div class="col-12 mt-2 mt-md-0">
                            <p class="mb-2 fw-bold text-black">'.$emp->telp.'</p>
                                <p>'.$emp->city.', '.$emp->postal_code.' [TaniKula Note: '.$emp->complete_address.' '.$emp->note_for_courier.']</p>
                                <p>'.$emp->city.', '.$emp->postal_code.'.</p>
                            </div>
                        </div>
                        <a href="#" id="'.$emp->id.'" class="pt-2 fw-bold editAlamat" type="button" data-bs-toggle="modal" data-bs-target="#EditAlamat" style="color: #16A085" data-bs-dismiss="modal">Edit alamat</a>
                    </div>
                </div>
                ';
			}
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada Alamat!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function addAlamat(Request $request) {
        $validator = Validator::make($request->all(), [
            'recipients_name' => 'required|max:255',
            'telp' => 'required',
            'address_label' => 'required',
            'postal_code' => 'required|max:5',
            'complete_address' => 'required',
            'note_for_courier' => 'required',
        ], [
            'recipients_name.required' => 'Nama Penerima diperlukan!',
            'recipients_name.max' => 'Nama Penerima maksimal 255 karakter!',
            'address_label.required' => 'Label Alamat diperlukan!',
            'postal_code.required' => 'Kode Pos diperlukan!',
            'complete_address.required' => 'Alamat Lengkap diperlukan!',
            'note_for_courier.required' => 'Catatan untuk kurir diperlukan!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $address = new Address();
            $address->recipients_name = $request->recipients_name;
            $address->address_label = $request->address_label;
            $address->postal_code = $request->postal_code;
            $address->city = $request->city;
            $address->telp = $request->telp;
            $address->complete_address = $request->complete_address;
            $address->note_for_courier = $request->note_for_courier;
            $address->main_address = $request->main_address ? 1 : 0;
            $address->user_id = auth()->user()->id;
            $address->save();

            return response()->json([
                    'status' => 200,
                ]);
        }
	}

    public function editAddress(Request $request)
    {
        $id = $request->id;
		$emp = Address::with('user')
                    ->join('users', 'addresses.user_id', '=', 'users.id')
                    ->select('addresses.*', 'users.email as email')
                    ->where('user_id', auth()->user()->id)
                    ->find($id);
		return response()->json($emp);
    }

    // handle update an employee ajax request
	public function updateAddress(Request $request) {
        $validator = Validator::make($request->all(), [
            'recipients_name' => 'required|max:255',
            'telp' => 'required',
            'address_label' => 'required',
            'postal_code' => 'required|max:5',
            'complete_address' => 'required',
            'note_for_courier' => 'required',
        ], [
            'recipients_name.required' => 'Nama Penerima diperlukan!',
            'recipients_name.max' => 'Nama Penerima maksimal 255 karakter!',
            'address_label.required' => 'Label Alamat diperlukan!',
            'postal_code.required' => 'Kode Pos diperlukan!',
            'complete_address.required' => 'Alamat Lengkap diperlukan!',
            'note_for_courier.required' => 'Catatan untuk kurir diperlukan!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $address = Address::find($request->emp_id);
            $address->recipients_name = $request->recipients_name;
            $address->address_label = $request->address_label;
            $address->postal_code = $request->postal_code;
            $address->city = $request->city;
            $address->telp = $request->telp;
            $address->complete_address = $request->complete_address;
            $address->note_for_courier = $request->note_for_courier;
            if ($request->main_address == 0) {
                $address->main_address = $request->main_address ? 1 : 0;
            } elseif ($request->main_address == 1) {
                $address->main_address = $request->main_address ? 0 : 1;
            }
            $address->user_id = auth()->user()->id;
            $address->update();

            return response()->json([
                    'status' => 200,
                ]);
        }
	}
}
