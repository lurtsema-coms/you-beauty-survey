<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FormResponseAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function formResponse()
    {
        return $this->belongsTo(FormResponse::class);
    }

    public function groupAnswers()
    {
        $groupConcatQuery = [];

        for ($i = 1; $i <= 10; $i++) {
            $question = config("global.question_$i");
            if ($question['is_multiple']) {
                foreach ($question['options'] as $key => $option) {
                    $columnName = 'question_' . $i . '_' . $key;
                    $groupConcatQuery[] = DB::raw("GROUP_CONCAT(CASE WHEN question = 'question-$i-$key' THEN value END) AS $columnName");
                }
            } else {
                $columnName = 'question_' . $i;
                $groupConcatQuery[] = DB::raw("GROUP_CONCAT(CASE WHEN question = 'question-$i' THEN value END) AS $columnName");
            }

            if ($question['with_other']) {
                $columnName = 'question_' . $i . '_other';
                $groupConcatQuery[] = DB::raw("GROUP_CONCAT(CASE WHEN question = 'question-$i-other' THEN value END) AS $columnName");
            }
        }

        return self::query()
            ->select('form_response_id', ...$groupConcatQuery)
            ->groupBy('form_response_id');
    }
}
