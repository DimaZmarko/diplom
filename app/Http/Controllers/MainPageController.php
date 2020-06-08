<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the site main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.mainPage', ['projects' => Project::with('donations')->get()]);
    }
}
