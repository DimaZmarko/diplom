<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payAction(Project $project, Request $request)
    {
        return view(
            'site.pay',
            [
                'project' => $project,
                'customAmount' => $request->get('amount')
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function placePaymentAction(Request $request)
    {
        return view();
    }
}
