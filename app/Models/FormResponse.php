<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FormResponse extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function formResponseAnswers()
    {
        return $this->hasMany(FormResponseAnswer::class);
    }
}
