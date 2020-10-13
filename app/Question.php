<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Question extends Model
{
    //
    protected $fillable =[
        'question',
        'category_id'
    ];

    public function options(){
        return $this->hasOne(Option::class);
    }
}
