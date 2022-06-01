<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Farmer;
use App\Models\Plant;
use App\Models\Education;
use App\Models\Activity;
use App\Models\Poktan;
use Redirect, Response;
Use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $year = ['2022','2023','2024','2025','2026','2027','2028','2029','2030'];

        $plant = [];
        $harvest = [];
        foreach ($year as $key => $value) {
            $plant[] = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->where('plants.harvest_date', '=', null)
                    ->where(\DB::raw("DATE_FORMAT(plants.created_at, '%Y')"),$value)
                    ->count();
            $harvest[] = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->whereNotNull('plants.harvest_date')
                    ->where(\DB::raw("DATE_FORMAT(plants.created_at, '%Y')"),$value)
                    ->count();
        }

    	return view('gapoktan.dashboard.index')
                ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
                ->with('plant',json_encode($plant,JSON_NUMERIC_CHECK))
                ->with('harvest',json_encode($harvest,JSON_NUMERIC_CHECK));
    }

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
        $countPlant = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->where('plants.harvest_date', '=', null)
                    ->count();
        $countHarvest = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->whereNotNull('plants.harvest_date')
                    ->count();
        $countFarmer = Farmer::join('poktans', 'farmers.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'farmers.user_id', '=', 'users.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countFarmerActive = Farmer::join('poktans', 'farmers.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'farmers.user_id', '=', 'users.id')
                    ->where('farmers.is_active', '=', 1)
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countFarmerDeactive = Farmer::join('poktans', 'farmers.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'farmers.user_id', '=', 'users.id')
                    ->where('farmers.is_active', '=', 0)
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countPoktan = Poktan::join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'poktans.user_id', '=', 'users.id')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countPoktanActive = Poktan::join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'poktans.user_id', '=', 'users.id')
                    ->where('poktans.is_active', '=', 1)
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countPoktanDeactive = Poktan::join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->join('users', 'poktans.user_id', '=', 'users.id')
                    ->where('poktans.is_active', '=', 0)
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->count();
        $countEducation = Education::where('user_id', auth()->user()->id)->count();
        $countActivity = Activity::where('user_id', auth()->user()->id)->count();

		$output = '';
            $output .= '
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Akun Poktan</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div>
                                        '.$countPoktan.'
                                    </div>
                                    <div class="mt-2 pl-2">
                                        <div style="font-size: 9px"><i class="fas fa-circle text-success" style="font-size: 9px"></i> Aktif('.$countPoktanActive.')</div>
                                        <div style="font-size: 9px"><i class="fas fa-circle text-danger" style="font-size: 9px"></i> Belum aktif('.$countPoktanDeactive.')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Akun Petani</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div>
                                        '.$countFarmer.'
                                    </div>
                                    <div class="mt-2 pl-2">
                                        <div style="font-size: 9px"><i class="fas fa-circle text-success" style="font-size: 9px"></i> Aktif('.$countFarmerActive.')</div>
                                        <div style="font-size: 9px"><i class="fas fa-circle text-danger" style="font-size: 9px"></i> Belum aktif('.$countFarmerDeactive.')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Tandur</h4>
                            </div>
                            <div class="card-body">
                                '.$countPlant.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-calendar-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Panen</h4>
                            </div>
                            <div class="card-body">
                                '.$countHarvest.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-clapperboard"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Post Edukasi</h4>
                            </div>
                            <div class="card-body">
                                '.$countEducation.'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background: #16A085">
                            <i class="far fa-solid fa-clipboard"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Post Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                '.$countActivity.'
                            </div>
                        </div>
                    </div>
                </div>';
			echo $output;
	}

}
