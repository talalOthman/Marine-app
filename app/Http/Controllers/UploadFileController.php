<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $user = User::find(Auth::id());
        if (!empty($request->file('file'))) {
            $avatar = $request->file('file');
            $extension = $avatar->getClientOriginalExtension();
            $avatar_name  = time() . '.' . $extension;
            $avatar->move(base_path('public/images/avatars'), $avatar_name);
            $user->avatar = $avatar_name;
            $user->has_image = 1;
            $user->save();
        }
    }
}
