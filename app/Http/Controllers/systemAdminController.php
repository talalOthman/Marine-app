<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class systemAdminController extends Controller
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

    public function AdminIndex()
    {
        if (Auth::user()) {
            $users = User::where('id', '!=', Auth::id())->get();
            return view('admin.dashboard')->with(['users' => $users])->with('active', 'admin.dashboard');
        }
    }

    public function redirectAddAccount()
    {
        return view('admin.add_account')->with('active', 'admin.add_account');
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user->delete()) {
            notify()->success('Delete Account Successfully!');
            return redirect(route('admin.dashboard'));
        } else {
            notify()->error('A Problem Occured While Deleting Selected Account');
            return redirect(route('admin.dashboard'));
        }
    }

    public function redirectUpdateSpecificAccount($userId)
    {
        $user = User::find($userId);
        return view('admin.update_specific_account')->with(['user' => $user])->with('active', 'admin.update_specific_account');
    }

    public function UpdateSpecificAccount(Request $req, $userId)
    {
        // Validate the data submitted by user
        $validator = Validator::make($req->all(), [
            'userName' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
            'avatar'   => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $user = User::find($userId);
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
            notify()->error('A Problem Occurred While Updating Account');
            return redirect(route('admin.dashboard'));
        }

        $user->userName = $req->userName;
        if (!is_null($req->password)) {
            $user->password = Hash::make($req->password);
        }
        $user->save();



        notify()->success('Updated Account Details Successfully!');
        return redirect(route('admin.dashboard'));
    }
}
