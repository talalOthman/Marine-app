<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VesselsExport;
use App\Imports\VesselsImport;
use App\Models\Vessel;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    { 
        set_time_limit(0);

        if (!empty($request->file('file'))) {

            Excel::import(new VesselsImport, request()->file('file'));
            notify()->success('File Uploaded Successfully!');
            return view('student.generate-report')->with('active', 'student.upload_file');
        }
    }


    public function fetchVessels()
    {
        $response = Http::get('http://192.168.100.26:8000/vessels');
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
