<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        // $user = User::find(Auth::id());
        if (!empty($request->file('file'))) {
            // $file = $request->file('file');
            // $extension = $file->getClientOriginalExtension();
            // $file_name  = time() . '.' . $extension;
            // $file->move(base_path('public/test/'), $file_name);
            Excel::import(new UsersImport, request()->file('file'));
        }
    }
}
