<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'sponsor_title', 'outstrem_logo', 'outstrem_logo', 'src', 'imaUrl', 'logo', 'poster', 'width', 'height', 'color', 'islogoshow', 'isAudionOn', 'iframe_code', 'decide_pre',
    ];
}
