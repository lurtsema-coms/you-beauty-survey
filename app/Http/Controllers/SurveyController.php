<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        return view('survey');
    }

    public function store(Request $request)
    {
        $request->validate([
            'survey' => ['json', 'required']
        ]);
        $survey = json_decode($request->survey, true);
        dd($survey);
    }
}
