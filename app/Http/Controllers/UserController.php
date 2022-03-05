<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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

    public function update(Request $req)
    {

        // Validate the data submitted by user
        $validator = Validator::make($req->all(), [
            'userName' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
            'avatar'   => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

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
            return redirect(route('dashboard'))->with('ErrorMessage', 'Error while updating account details');
        }

        $user->userName = $req->userName;
        if(!is_null($req->password)){
            $user->password = Hash::make($req->password);
        }
        $user->save();



        return redirect(route('dashboard'))->with('SuccessMessage', 'Updated account details successfully');
    }

    public function UpdateSpecificAccount(Request $req, $userId){
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
            return redirect(route('dashboard'))->with('ErrorMessage', 'Error while updating account details');
        }

        $user->userName = $req->userName;
        if(!is_null($req->password)){
            $user->password = Hash::make($req->password);
        }
        $user->save();



        return redirect(route('dashboard'))->with('SuccessMessage', 'Updated account details successfully');
    }

    public function deleteUser($userId){
        $user = User::find($userId);
        
        if($user->delete()){
            return redirect(route('dashboard'))->with('SuccessMessage', 'Successfully delete the selected user');
        } else{
            return redirect(route('dashboard'))->with('ErrorMessage', 'Error while deleting the selected account');
        }
    }

}
