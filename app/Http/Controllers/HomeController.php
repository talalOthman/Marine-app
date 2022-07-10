<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vessel;
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


    public function StudentIndex()
    {
        return view('student.dashboard')->with('active', 'student.dashboard');
    }

    public function PublicIndex()
    {
        return view('public.dashboard')->with('active', 'public.dashboard');
    }

    public function redirectUploadFile()
    {
        return view('student.upload-file')->with('active', 'student.upload_file');
    }

    public function redirectDensityOfTraffic()
    {
        return view('public.density_of_traffic')->with('active', 'public.density_of_traffic');
    }

    public function redirectVesselDetails()
    {
        $vessels = Vessel::all();
        return view('public.vessel_details')->with(['vessels' => $vessels])->with('active', 'public.vessel_details');
    }
}
