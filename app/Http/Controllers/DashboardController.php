<?php

namespace App\Http\Controllers;

use App\Models\Checksheet;
use App\Models\Kereta;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $active = 'dashboard';
        $keretas = Kereta::count();
        $spareparts = Sparepart::count();
        $checksheet = Checksheet::count();

        //count is_so = "1" group by month in column "date_time" where this year in model Checksheet
        $checksheet_so = Checksheet::selectRaw('MONTH(date_time) as month, COUNT(is_so) as total')
            ->where('is_so', "1")
            ->whereYear('date_time', date('Y'))
            ->groupBy('month')
            ->get();
        // looping number 1-12 then mapping $checksheet_so to month if not exist return 0 value
        $checksheet_so = collect(range(0, 11))->map(function ($month) use ($checksheet_so) {
            $total = $checksheet_so->where('month', $month)->first();
            return $total ? $total->total : 0;
        });

        $checksheet_tso = Checksheet::selectRaw('MONTH(date_time) as month, COUNT(is_so) as total')
            ->where('is_so', "0")
            ->whereYear('date_time', date('Y'))
            ->groupBy('month')
            ->get();
        // looping number 1-12 then mapping $checksheet_so to month if not exist return 0 value
        $checksheet_tso = collect(range(0, 11))->map(function ($month) use ($checksheet_tso) {
            $total = $checksheet_tso->where('month', $month)->first();
            return $total ? $total->total : 0;
        });

        return view('dashboard.index', compact('active', 'keretas', 'spareparts', 'checksheet', 'checksheet_so', 'checksheet_tso'));
    }
}
