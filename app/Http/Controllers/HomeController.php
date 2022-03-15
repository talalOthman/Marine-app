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
        if (Auth::user()->userType == "Admin") {
            $users = User::where('id', '!=', Auth::id())->get();
            return redirect()->route('admin.dashboard', ['users' => $users]);
        } elseif (Auth::user()->userType == "Student") {
            return redirect()->route('student.dashboard');
        } elseif (Auth::user()->userType == "Public") {
            return redirect()->route('public.dashboard');
        }
    }

    public function AdminIndex()
    {
        if (Auth::user()) {
            $users = User::where('id', '!=', Auth::id())->get();
            return view('admin.dashboard')->with(['users' => $users]);
        }
    }

    public function StudentIndex()
    {
        return view('student.dashboard');
    }

    public function PublicIndex()
    {
        return view('public.dashboard');
    }

    public function redirectAddAccount()
    {
        return view('admin.add_account');
    }

    public function redirectUpdateAccount()
    {
        return view('update_account');
    }

    public function redirectUpdateSpecificAccount($userId)
    {
        $user = User::find($userId);
        return view('admin.update_specific_account')->with(['user' => $user]);
    }

    public function redirectUploadFile()
    {
        return view('student.upload-file');
    }

    public function redirectDensityOfTraffic(){
        return view('public.density_of_traffic');
    }

    public function redirectVesselDetails(){
        return view('public.vessel_details');
    }
}
