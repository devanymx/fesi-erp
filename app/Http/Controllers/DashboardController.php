<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /*
     * Provides a simple menu for administrators
     * */
    public function showDashboard(Request $request){

        return view('dashboard');

    }

}
