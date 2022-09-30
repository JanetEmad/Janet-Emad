<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard');
    }
}
