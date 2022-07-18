<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class SalesRekapController extends Controller
{
    // set index page view
	public function index(Request $request) {

		return view('gapoktan.rekap_penjualan.index');
	}

        // handle fetch all eamployees ajax request
	public function fetchAll(Request $request)
    {
		if(!empty($request->from_date))
        {
            $orderRekap = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->where('orders.status', '=', 'completed')
                    ->whereBetween('orders.order_date', array($request->from_date, $request->to_date))
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
        }
        else
        {
            $orderRekap = Order::join('users', 'orders.user_id', '=', 'users.id')
                    ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                    ->select('orders.*', 'addresses.recipients_name as name_billing')
                    ->where('orders.status', '=', 'completed')
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
        }
		$output = '';
		if ($orderRekap->count() > 0) {
			$output .= '<table class="p-0 table table-striped table-sm text-center align-middle">
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
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($orderRekap as $emp) {
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
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Penjualan!</h1>';
		}
	}
}
