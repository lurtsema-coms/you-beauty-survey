<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = ['created_at', 'updated_at'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
