<?php

namespace App\Http\Requests\Survey;

use Illuminate\Foundation\Http\FormRequest;

class SurveyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required'],
            'name' => ['required'],
            'amount' => ['required'],
            'description' => ['required'],
        ];
        $messages =
            [
                'category_id.required' => 'Please Enter the survey name',
                'name.required' => 'Please Enter the survey name',
                'description.required' => 'Enter Survey Description',
                'amount.required' => 'Enter Survey Amount',
            ];
    }
}
