<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Maatwebsite\Excel\Facades\Excel;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Exports\VesselsExport;
use App\Imports\VesselsImport;
use App\Models\Vessel;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        // $vessels = Vessel::all(); 
        
        set_time_limit(0);

        if (!empty($request->file('file'))) {

            //     foreach($vessels as $vessel){
            //     $response = Http::post('http://192.168.100.26:8000/add-vessel/', [

            //         'type' => $vessel->type,
            //         'callName' => $vessel->callName,
            //         'MMSI' => $vessel->MMSI,
            //         'cargo' => $vessel->cargo,
            //     ]);
            // }
            // $file = $request->file('file');
            // $extension = $file->getClientOriginalExtension();
            // $file_name  = time() . '.' . $extension;
            // $file->move(base_path('public/test/'), $file_name);



            // // create the file receiver
            // $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

            // // check if the upload is success, throw exception or return response you need
            // if ($receiver->isUploaded() === false) {
            //     throw new UploadMissingFileException();
            // }

            // // receive the file
            // $save = $receiver->receive();

            // // check if the upload has finished (in chunk mode it will send smaller files)
            // if ($save->isFinished()) {
            //     // save the file and return any response you need, current example uses `move` function. If you are
            //     // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            //     return $this->saveFile($save->getFile());
            // }

            // // we are in chunk mode, lets send the current progress
            // /** @var AbstractHandler $handler */
            // $handler = $save->handler();

            // return response()->json([
            //     "done" => $handler->getPercentageDone(),
            // ]);



            Excel::import(new VesselsImport, request()->file('file'));
        }
    }

    public function generateReport(Request $request)
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
        return Excel::download(new VesselsExport, 'vessels.csv');
        // return redirect(route('student.dashboard'))->with('SuccessMessage', 'Report generated successfully');
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
