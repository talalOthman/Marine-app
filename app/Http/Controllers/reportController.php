<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use App\Models\Vessel;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function generateReport(Request $request)
    {
        Report::truncate();
        $response = Http::get('http://192.168.100.26:8000/report');
        $vessels = json_decode($response->body());
        foreach ($vessels as $vessel) {
            $report = new Report();
            $report->date_time = $vessel->date_time;
            $report->MMSI = $vessel->MMSI;
            $report->rot = $vessel->rot;
            $report->sog = $vessel->sog;
            $report->lat = $vessel->lat;
            $report->long = $vessel->long;
            $report->cog = $vessel->cog;
            $report->true_heading = $vessel->true_heading;
            $report->timestamp = $vessel->timestamp;
            $report->ais_channel = $vessel->ais_channel;
            $report->save();
        }
        return Excel::download(new ReportExport, 'Generated-Report.csv');
    }
}
