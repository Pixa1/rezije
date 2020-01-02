<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    //
    public $timestamps = false;
    protected $hidden = ['id'];
    protected $dates = [
        'date',
    ];
}
