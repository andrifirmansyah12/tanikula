<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Costumer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $data = ['userInfo' => Costumer::with('user')
            ->where('user_id', '=', auth()->user()->id)
            ->first()
        ];

        return view('costumer.alamat.index', $data);
    }

    public function autocomplete(Request $request)
    {
        return Address::select('recipients_name')
        ->where('recipients_name', 'like', "%{$request->term}%")
        ->pluck('recipients_name');
    }

        // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Address::with('user')
                    ->join('users', 'addresses.user_id', '=', 'users.id')
                    ->select('addresses.*', 'users.email as email')
                    ->where('user_id', auth()->user()->id)
                    // ->filter(request(['pencarian']))
                    ->orderBy('addresses.main_address', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			foreach ($emps as $emp) {
				$output .= '
                <div class="d-flex justify-content-center align-items-center rounded">
                    <div class="col-12 card mt-2 border border-success rounded">';
                        if ($emp->main_address == 1) {
                            $output .= '<div class="card-body rounded" style="background-color: hsl(110, 100%, 75%);">';
                        } else if($emp->main_address == 0) {
                            $output .= '<div class="card-body rounded">';
                        }
                            $output .= '<div class="row align-items-center rounded">
                                <div>';
                                    if ($emp->main_address == 1) {
                                    $output .= '<p class="fw-bold text-black mb-2">' . $emp->recipients_name .'
                                        <span class="fw-normal">('.$emp->address_label.') </span>
                                        <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-patch-check-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </p>';
                                    } else if($emp->main_address == 0) {
                                    $output .= '<p class="fw-bold text-black mb-2">' . $emp->recipients_name .'
                                        <span class="fw-normal">('.$emp->address_label.') </span>
                                    </p>';
                                    }
                                $output .= '</div>
                                <div class="col-12 col-md-10 mt-2 mt-md-0">
                                    <p class="mb-2 fw-bold text-black">'. $emp->telp .'</p>
                                    <p>'.$emp->city.', '.$emp->postal_code.' [TaniKula Note:
                                        '.$emp->complete_address.' '.$emp->note_for_courier.']</p>
                                    <p>'.$emp->city.', '.$emp->postal_code.'.</p>
                                </div>
                            </div>
                            <a href="#" id="'.$emp->id.'" class="pt-2 fw-bold editAlamat" type="button"
                                data-bs-toggle="modal" data-bs-target="#EditAlamat" style="color: #16A085"
                                data-bs-dismiss="modal">Edit alamat</a>
                            <a href="#" id="'.$emp->id.'" class="mt-2 ms-md-3 bg-light fw-bold updateMainAddress border px-2 rounded" style="color: #16A085">Jadikan alamat utama</a>
                        </div>
                    </div>
                </div>
                ';
			}
			echo $output;
		} else {
			echo '<div id="app">
                    <section class="section">
                        <div class="container">
                            <div class="page-error">
                                <div class="page-inner">
                                    <div class="page-description">
                                        Anda belum menambahkan alamat!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>';
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
            if ($request->main_address ? 1 : 0) {
                $addressOld = Address::where('user_id', auth()->user()->id)->latest()->get();
                foreach ($addressOld as $item) {
                    if ($item->main_address == 1) {
                        $datasFound = Address::findOrFail($item->id);
                        $datasFound->main_address = 0;
                        $datasFound->update();
                    }
                }
            }

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
            if ($request->main_address ? 1 : 0) {
                $addressOld = Address::where('user_id', auth()->user()->id)->latest()->get();
                foreach ($addressOld as $item) {
                    if ($item->main_address == 1) {
                        $datasFound = Address::findOrFail($item->id);
                        $datasFound->main_address = 0;
                        $datasFound->update();
                    }
                }
            }
            
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
