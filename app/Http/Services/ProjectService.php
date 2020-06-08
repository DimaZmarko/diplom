<?php

namespace App\Http\Services;

use Validator;

class ProjectService
{
    /**
     * @param $inputFields
     * @return array
     */
    public function validateProjectInput($inputFields)
    {
        $massages = [
            'required' => 'Field :attribute is required!',
            'unique' => 'Field :attribute must be unique!'
        ];

        $validator = Validator::make($inputFields, [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'full_amount' => 'required',
            'deadline' => 'required',
            'description' => 'required'
        ], $massages);

        return ['success' => $validator->passes(), 'validator' => $validator];
    }

    /**
     * @param \App\Project $project
     * @param array $inputFields
     * @return bool
     */
    public function persistProject(\App\Project $project, array $inputFields)
    {

        $project->fill($inputFields);

        return $project->save();
    }
}
