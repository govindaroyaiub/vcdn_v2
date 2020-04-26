<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
class PlayerController extends Controller
{
    public function index($id,$p)
    {
        $player = Player::find($id);
 
        return view('player')->with('data',$player)->with('p',$p);
    }
}
