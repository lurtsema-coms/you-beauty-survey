<?php

namespace App\Exports;

use App\Models\FormResponseAnswer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FormResponseExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $answers = (new FormResponseAnswer())->groupAnswers()->get();
        return view('exports.form-response', compact('answers'));
    }
}
