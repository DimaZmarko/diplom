<?php

namespace App\Http\Services;

use App\Project;
use Validator;

class DonationService
{
    /**
     * @param $inputFields
     * @return array
     */
    public function validateDonationInput($inputFields)
    {
        $massages = [
            'required' => 'Field :attribute is required!',
            'unique' => 'Field :attribute must be unique!'
        ];

        $validator = Validator::make($inputFields, [
            'payer_first_name' => 'required|max:255',
            'payer_last_name' => 'required|max:255',
            'payer_email' => 'required|max:255',
            'paid_amount' => 'required',
            'project_id' => 'required'
        ], $massages);

        return ['success' => $validator->passes(), 'validator' => $validator];
    }

    /**
     * @param \App\Donation $donation
     * @param array $inputFields
     * @return bool
     */
    public function persistDonation(\App\Donation $donation, array $inputFields)
    {
        if (!$donation->id) {
            $project = Project::find($inputFields['project_id']);
            $oldAmount = $project->paid_amount;
            $project->paid_amount = $oldAmount + $inputFields['paid_amount'];
            $project->save();
        }

        $donation->fill($inputFields);

        return $donation->save();
    }
}
