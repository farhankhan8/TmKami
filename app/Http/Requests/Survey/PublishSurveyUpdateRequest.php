<?php

namespace App\Http\Requests\Survey;

use Illuminate\Foundation\Http\FormRequest;

class PublishSurveyUpdateRequest extends FormRequest
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
            'survey_question_id' => ['integer', 'exists:survey_questions,id'],
            'question_id' => ['integer'],
            'DateRollout' => [''],
            'isPublished' => [''],
            'DateTobeOnline' => [''],
            'RollOutBy' => ['integer'],
        ];
    }
}