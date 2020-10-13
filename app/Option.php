<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Option extends Model
{
    //

    protected $fillable =[
        'question_id',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
    ];

    public function options(){
        return $this->belongsTo(Question::class);
    }
}
