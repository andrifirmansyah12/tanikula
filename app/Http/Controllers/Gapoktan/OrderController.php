<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        return view('gapoktan.pesanan.index');
    }

    public function fetchDikemas()
    {
		$emps = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->where('orders.payment_status', '=', 'paid')
                    ->where('orders.status', '=', 'confirmed')
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
		$output = '';
           if ($emps->count() > 0) {
			$output .= '<table id="tableDikemas" class="table table-striped table-sm text-center align-middle">
            <thead class="text-darken">
                <th>No.</th>
                <th>
                    ID Pesanan
                </th>
                <th class="text-center">
                    Total Bayar
                </th>
                <th class="text-center">
                    Nama Pemesan
                </th>
                <th class="text-center">
                    Status Pesanan
                </th>
                <th class="text-center">
                    Status Pembayaran
                </th>
                <th class="text-center">
                </th>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                // if ($emp->gapoktan->user->name == auth()->user()->name) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="m-0 text-sm font-weight-bold">'. $emp->code .'</p>
                        <p class="text-xs m-0">
                            '. \App\Helpers\General::datetimeFormat($emp->order_date) .'</p>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold m-0">Rp.
                            '. number_format($emp->total_price, 0) .'</p>
                        </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="m-0 text-sm">'. $emp->name_billing .'</p>
                            <p class="text-xs m-0">'. $emp->user->email .'</p>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->status .'</span>
                        </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->payment_status .'</span>
                    </td>
                    <td class="align-middle">
                        <a href="/gapoktan/pesanan/detail-pesanan/'.$emp->id.'" class="text-secondary font-weight-bold text-xs">
                            Detail Pesanan
                        </a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h5 class="text-center text-secondary my-5">Belum ada pesanan!</h5>';
		}
	}

    public function fetchDikirim()
    {
		$emps = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->where('orders.payment_status', '=', 'paid')
                    ->where('orders.status', '=', 'delivered')
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
		$output = '';
           if ($emps->count() > 0) {
			$output .= '<table id="tableDikirim" class="table table-striped table-sm text-center align-middle">
            <thead class="text-darken">
                <th>No.</th>
                <th>
                    ID Pesanan
                </th>
                <th class="text-center">
                    Total Bayar
                </th>
                <th class="text-center">
                    Nama Pemesan
                </th>
                <th class="text-center">
                    Status Pesanan
                </th>
                <th class="text-center">
                    Status Pembayaran
                </th>
                <th class="text-center">
                </th>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                // if ($emp->gapoktan->user->name == auth()->user()->name) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="m-0 text-sm font-weight-bold">'. $emp->code .'</p>
                        <p class="text-xs m-0">
                            '. \App\Helpers\General::datetimeFormat($emp->order_date) .'</p>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold m-0">Rp.
                            '. number_format($emp->total_price, 0) .'</p>
                        </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="m-0 text-sm">'. $emp->name_billing .'</p>
                            <p class="text-xs m-0">'. $emp->user->email .'</p>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->status .'</span>
                        </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->payment_status .'</span>
                    </td>
                    <td class="align-middle">
                        <a href="/gapoktan/pesanan/detail-pesanan/'.$emp->id.'" class="text-secondary font-weight-bold text-xs">
                            Detail Pesanan
                        </a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h5 class="text-center text-secondary my-5">Belum ada pesanan!</h5>';
		}
	}

    public function fetchSelesai()
    {
		$emps = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->where('orders.payment_status', '=', 'paid')
                    ->where('orders.status', '=', 'completed')
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
		$output = '';
           if ($emps->count() > 0) {
			$output .= '<table id="tableSelesai" class="table table-striped table-sm text-center align-middle">
            <thead>
                <th>No.</th>
                <th>
                    ID Pesanan
                </th>
                <th class="text-center">
                    Total Bayar
                </th>
                <th class="text-center">
                    Nama Pemesan
                </th>
                <th class="text-center">
                    Status Pesanan
                </th>
                <th class="text-center">
                    Status Pembayaran
                </th>
                <th class="text-center">
                </th>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                // if ($emp->gapoktan->user->name == auth()->user()->name) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="m-0 text-sm font-weight-bold">'. $emp->code .'</p>
                        <p class="text-xs m-0">
                            '. \App\Helpers\General::datetimeFormat($emp->order_date) .'</p>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold m-0">Rp.
                            '. number_format($emp->total_price, 0) .'</p>
                        </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="m-0 text-sm">'. $emp->name_billing .'</p>
                            <p class="text-xs m-0">'. $emp->user->email .'</p>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->status .'</span>
                        </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-xs font-weight-bold text-capitalize">'. $emp->payment_status .'</span>
                    </td>
                    <td class="align-middle">
                        <a href="/gapoktan/pesanan/detail-pesanan/'.$emp->id.'" class="text-secondary font-weight-bold text-xs">
                            Detail Pesanan
                        </a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h5 class="text-center text-secondary my-5">Belum ada pesanan!</h5>';
		}
	}

    public function viewOrder($id)
    {
        $order = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->orderBy('orders.created_at', 'desc')
                    // ->where('orders.id', '=', $id)
                    ->find($id);
        return view('gapoktan.pesanan.detail', compact('order'));
    }

    // handle update an employee ajax request
	public function updateOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            // Required
        ], [
            // Validator
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else 
        {
            $orders = Order::find($request->emp_id);
            $orders->status = Order::DELIVERED;
			$orders->update();

            return response()->json([
                    'status' => 200,
                ]);
        }
	}
}
