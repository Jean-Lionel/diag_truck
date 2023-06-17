<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Patient;
use App\Models\Assignation;
use App\Models\Prescription;

class HomeController extends Controller
{
    public function dashboard(){
        $users = User::all();
        $services = Service::all();
        $patient_total = Patient::all()->count();
        $assignation_total = Assignation::all()->count();
        $prescription_total = Prescription::all()->count();

        return view('layouts.dashboard', compact('users', 'services', 'patient_total', 'assignation_total', 'prescription_total'));
    }
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
        return view('home');
    }
}
