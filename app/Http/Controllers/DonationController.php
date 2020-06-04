<?php

namespace App\Http\Controllers;

class DonationController extends Controller
{

    /**
     * DonationController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Render payment page view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('site.pay');
    }
}
