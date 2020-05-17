<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
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
        return view('site.singleProject');
    }
}
