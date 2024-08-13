<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $activeSurvey = Survey::where('is_active', true)->first();
        $questions = Question::where('survey_id', $activeSurvey?->id)->get()->toArray();
        foreach ($questions as $key => $question) {
            $questions[$key]['choices'] = Choice::where('question_id', $question['id'])->get()->toArray();
        }
        return view('survey', compact('activeSurvey', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'survey' => ['json', 'required']
        ]);
        $surveyQuestions = json_decode($request->survey, true);
        Survey::where('is_active', true)->update([
            'is_active' => false
        ]);
        $survey = Survey::create([
            'is_active' => true
        ]);

        foreach ($surveyQuestions as $surveyQuestion) {
            $question = Question::create([
                'survey_id' => $survey->id,
                'question' => $surveyQuestion['question'],
                'type' => $surveyQuestion['type'],
            ]);

            if ($question->type === 'multiple_choice') {
                foreach ($surveyQuestion['choices'] as $choice) {
                    $question->choices()->create([
                        'choice' => $choice['text']
                    ]);
                }
            }
        }

        return redirect(route('survey'))->with(['success' => 'Survey form submitted successfully.']);
    }
}
