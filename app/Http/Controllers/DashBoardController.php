<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
     public function index()
    {

    //* without facade
    // return View::make('layout.dashboard');

    //* another way without facade
    // return response()->view('layout.dashboard');

    //* 
        return view('dashboard.dashView');
    }

}
