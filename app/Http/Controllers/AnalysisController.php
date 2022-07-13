<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VesselDynamicDetails;
use App\Models\Vessel;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function heatMapIndex(){
        return VesselDynamicDetails::select('lat', 'long')->take(40000)->get();
        // return VesselDynamicDetails::get(['lat', 'long']);
    }

    public function publicDashboardIndex(){
        return DB::table('vessels')
            ->join('vessel_dynamic_details', 'vessels.id', '=', 'vessel_dynamic_details.vessel_id')
            ->select('vessel_dynamic_details.lat', 'vessel_dynamic_details.long', 'vessels.MMSI', 'vessel_dynamic_details.vessel_id')->take(40000)->get();

    }
}
