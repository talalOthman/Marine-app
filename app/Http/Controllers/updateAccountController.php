<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class updateAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirectUpdateAccount()
    {
        return view('update_account')->with('active', 'update_account');
    }

    public function update(Request $req)
    {

        // Validate the data submitted by user
        if ($req->password != null) {
            $validator = Validator::make($req->all(), [
                'userName' => ['required', 'string', 'max:255'],
                'password' => ['string', 'min:8', 'confirmed'],
                'avatar'   => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ])->validate();
        } else {
            $validator = Validator::make($req->all(), [
                'userName' => ['required', 'string', 'max:255'],
                'avatar'   => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ])->validate();
        }

        $user = User::find(Auth::id());
        $avatar_name = null;


        if ($req->hasFile('avatar')) {
            $avatar = $req->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            $avatar_name  = time() . '.' . $extension;
            $avatar->move(base_path('public/images/avatars/'), $avatar_name);
            $user->has_image = true;
        }

        if ($avatar_name !== null) {
            $user->avatar = $avatar_name;
        }

        if ($req->userName == null) {
            if ($user->userType == "Admin") {
                notify()->error('A Problem Occurred While Updating Account');
                return redirect(route('admin.dashboard'));
            } elseif ($user->userType == "Student") {
                notify()->error('A Problem Occurred While Updating Account');
                return redirect(route('student.dashboard'));
            } else {
                notify()->error('A Problem Occurred While Updating Account');
                return redirect(route('public.dashboard'));
            }
        }

        $user->userName = $req->userName;
        if (!is_null($req->password)) {
            $user->password = Hash::make($req->password);
        }
        $user->save();


        if ($user->userType == "Admin") {
            notify()->success('Updated Account Details Successfully!');
            return redirect(route('admin.dashboard'));
        } elseif ($user->userType == "Student") {
            notify()->success('Updated Account Details Successfully!');
            return redirect(route('student.dashboard'));
        } else {
            notify()->success('Updated Account Details Successfully!');
            return redirect(route('public.dashboard'));
        }
    }
}
