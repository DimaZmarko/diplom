<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Http\Services\DonationService;
use App\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * @var DonationService
     */
    protected $donationService;

    /**
     * DonationController constructor.
     * @param DonationService $donationService
     */
    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addDonation(Request $request)
    {
        if ($request->isMethod('post')) {
            $inputFields = $request->except('_token');
            $validation = $this->donationService->validateDonationInput($inputFields);

            if (!$validation['success']) {
                return redirect()
                    ->route('addDonation')
                    ->withErrors($validation['validator'])
                    ->withInput();
            }

            if ($this->donationService->persistDonation(new Donation(), $inputFields)) {
                return redirect('admin/donations')->with('status', 'Пожертву додано!');
            }
        }

        return view('admin.addDonation', ['projects' => Project::all()]);
    }

    /**
     * @param Donation $donation
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editDonation(Donation $donation, Request $request)
    {
        if ($request->isMethod('post')) {
            $inputFields = $request->except('_token');
            $validation = $this->donationService->validateDonationInput($inputFields);

            if (!$validation['success']) {
                return redirect()
                    ->route('editDonation')
                    ->withErrors($validation['validator'])
                    ->withInput();
            }

            if ($this->donationService->persistDonation($donation, $inputFields)) {
                return redirect('admin/donations')->with('status', 'Пожертву змінено!');
            }
        }

        return view(
            'admin.editDonation',
            [
                'donation' => $donation,
                'projects' => Project::all()
            ]
        );
    }

    /**
     * @param Donation $donation
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteDonation(Donation $donation, Request $request)
    {
        if ($request->isMethod('post')) {
            /* @var Project $project */
            $project = $donation->project();
            $oldAmount = $project->paid_amount;
            $project->paid_amount = $oldAmount - $donation->paid_amount;

            $project->save();
            $donation->delete();
            return redirect('admin/project')->with('status', 'Пожертву видалено');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllDonations()
    {
        return view(
            'admin.donations',
            [
                'title' => 'All donations',
                'donations' => Donation::with('project')->get()
            ]
        );
    }
}
