<?php

namespace App\Http\Controllers\Survey;

use App\User;
use Carbon\Carbon;
use App\CompletedSurvey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Survey\Survey;
use App\Models\Survey\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Survey\SurveyQuestion;
use App\Http\Requests\Survey\SurveyStoreRequest;
use App\Http\Requests\Survey\SurveyUpdateRequest;

class SurveyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "okahay";
        $surveys = Survey::latest()->with(array(
            'questions' => function ($query) {
                $query->select(
                    'category_id',
                    'survey_id',
                    'questiontype_id',
                    'question',
                    'isPublished',
                    'isBeenAnswered'
                );
            },
            'category' => function ($query) {
                $query->select('id', 'name');
            }, 'attempts'
        ))->get(); //->paginate(10);
        //this is to make the query more optimized and load fast
        $page_title = 'Surveys';
        // with('questions', 'category')
        return view('survey.index', compact('surveys', 'page_title'));
    }

    public function status($id)
    {
        $survey = Survey::find($id);
        if ($survey->active == 1)
            $survey->update([
                'active' => 0,
            ]);
        else
            $survey->update([
                'active' => 1,
            ]);
        return back();
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::orderBy('name', 'asc')->get(['id', 'name']);
        $page_title = 'Survery Setup';
        return view('survey.create', compact(['page_title', 'categories']));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Survey\survey $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $survey = Survey::all();
        dd($survey);
        return view('survey.show', compact('survey'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Survey\survey $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Survey $survey)
    {
        return view('survey.edit', compact('survey'));
    }

    /**
     * @param \App\Http\Requests\Survey\SurveyUpdateRequest $request
     * @param \App\Survey\survey $survey
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyUpdateRequest $request, Survey $survey)
    {
        $survey->update($request->validated());

        $request->session()->flash('survey.id', $survey->id);

        return redirect()->route('survey.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Survey\survey $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Survey $survey)
    {
        return $survey;
        $survey->delete();
        return redirect()->route('survey.index');
    }

    /**
     * @param \App\Http\Requests\Survey\SurveyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyStoreRequest $request)
    {
        $setupSurvey = Survey::create($request->validated() + ['surveySlug' => Str::slug($request['name'])]);
        $request->session()->flash('survey-created', 'Survey created successfully');
        return redirect()->route('admin.survey.create');
    }

    // Survey Result

    public function indexResult($id)
    {
        $page_title = 'Result';
        $answers =  CompletedSurvey::where('survey_question_id', $id)->get();
        $question = SurveyQuestion::find($id)->question;
        return view('survey.surveyResult.index', compact('page_title', 'question', 'answers'));
    }

    public function indexInputResult($id)
    {
        $page_title = 'Result';
        $answers =  CompletedSurvey::where('survey_question_id', $id)->get();
        $question = SurveyQuestion::find($id)->question;
        return view('survey.surveyResult.indexInput', compact('page_title', 'question', 'answers'));
    }


    public function indexMultiResult($id)
    {
        $page_title = 'Result';
        $answers =  CompletedSurvey::where('survey_question_id', $id)->where('option', '!=', "")->get();
        $question = SurveyQuestion::find($id)->question;
        return view('survey.surveyResult.indexMulti', compact('page_title', 'question', 'answers'));
    }

    public function indexYesno($id)
    {
        $page_title = 'Result';
        $yes =  CompletedSurvey::where('survey_question_id', $id)->where('option',  "yes")->count();
        $no =  CompletedSurvey::where('survey_question_id', $id)->where('option',  "no")->count();
        $question = SurveyQuestion::find($id)->question;
        return view('survey.surveyResult.indexYesno', compact('page_title', 'question', 'yes', 'no'));
    }
}
