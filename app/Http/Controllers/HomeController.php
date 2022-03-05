<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            $users = User::where('id', '!=', Auth::id())->get();
            return view('home')->with(['users' => $users]);
        } else{
            return view('auth.login');
        }
    }

    public function redirectAddAccount(){
        return view('add_account');
    }

    public function redirectUpdateAccount(){
        return view('update_account');
    }

    public function redirectUpdateSpecificAccount($userId){
        $user = User::find($userId);
        return view('update_specific_account')->with(['user' => $user]);
    }
}
