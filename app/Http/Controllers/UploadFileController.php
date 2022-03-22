<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Imports\VesselsImport;
use App\Exports\VesselsExport;
use App\Models\Vessel;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $vessels = Vessel::all();   

        if (!empty($request->file('file'))) {
            
            foreach($vessels as $vessel){
            $response = Http::post('http://192.168.128.241:8000/add-vessel/', [

                'type' => $vessel->type,
                'callName' => $vessel->callName,
                'MMSI' => $vessel->MMSI,
                'cargo' => $vessel->cargo,
            ]);
        }
            // $file = $request->file('file');
            // $extension = $file->getClientOriginalExtension();
            // $file_name  = time() . '.' . $extension;
            // $file->move(base_path('public/test/'), $file_name);
            Excel::import(new VesselsImport, request()->file('file'));
        }
    }

    public function generateReport(Request $request)
    {
        $response = Http::get('http://192.168.128.241:8000/vessels');
        $vessels = json_decode($response->body());
        foreach ($vessels as $vessel) {
            $newVessel = new Vessel();
            $newVessel->type = $vessel->type;
            $newVessel->callName = $vessel->callName;
            $newVessel->MMSI = $vessel->MMSI;
            $newVessel->cargo = $vessel->cargo;
            $newVessel->save();
        }
        return Excel::download(new VesselsExport, 'vessels.csv');
        // return redirect(route('student.dashboard'))->with('SuccessMessage', 'Report generated successfully');
    }

    public function fetchVessels()
    {
        $response = Http::get('http://192.168.128.241:8000/vessels');
        $vessels = json_decode($response->body());
        foreach ($vessels as $vessel) {
            $newVessel = new Vessel();
            $newVessel->type = $vessel->type;
            $newVessel->callName = $vessel->callName;
            $newVessel->MMSI = $vessel->MMSI;
            $newVessel->cargo = $vessel->cargo;
            $newVessel->save();
        }
        return redirect(route('generate-report'));
    }
}
