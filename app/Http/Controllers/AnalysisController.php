<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VesselDynamicDetails;

class AnalysisController extends Controller
{
    public function heatMapIndex(){
        return VesselDynamicDetails::select('lat', 'long')->get();
        // return VesselDynamicDetails::get(['lat', 'long']);
        // return VesselDynamicDetails::select('lat', 'long')->take(10)->get();
    }
}
