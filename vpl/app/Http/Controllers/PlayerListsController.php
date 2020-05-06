<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\User;
use App\Company;
class PlayerListsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::join('users', 'players.client_id', 'users.id')
                        ->join('clients', 'users.client_id', 'clients.id')
                        ->select('players.id', 'players.name', 'players.src', 'players.iframe_code', 'players.created_at', 'users.first_name', 'users.last_name', 'clients.company_name')
                        ->get();

        return view('playerList')->with('players',$players);
    }

    public function edit($id)
    {
        $player = Player::find($id);
        $client_info = User::join('clients', 'users.client_id', 'clients.id')
                            ->where('users.user_type', '=', 'client')
                            ->select('users.id', 'users.first_name', 'users.last_name', 'clients.company_name')
                            ->orderBy('users.first_name')
                            ->get();
        return view('playerEdit', compact('player', 'client_info', 'id'));   
    }

    public function SavePlayer(Request $request){
        $input = $request->all();
        \Log::info($input);
        $url = config('app.base_url');
        
        $id = $input["id"];
        $srcUrl = $input["src"];
        $imaUrl = $input["imaUrl"];
        $name = $input["name"];
        $logoUrl = $input["logo"];
        $posterUrl = $input["poster"];
        $width = $input["width"]."px";
        $height = $input["height"]."px";
        $color = $input["color"];
        $imaAdsurl = $input["imaUrl"];
        $audioOnOff = $input["audioOnOff"];
        $logoOnOff = $input["logoOnOff"];
        $decide_pre = $input["decide_pre"];
        $sponsor_title = $input["sponsor_title"];
        $outstrem_logo = $input["outstrem_logo"];

        $player = Player::find($id);

        $player->name = $name;
        $player->src = $srcUrl;
        $player->imaUrl = $imaUrl;
        $player->logo = $logoUrl;
        $player->poster = $posterUrl;
        $player->color = $color;
        $player->islogoshow = $logoOnOff;
        $player->isAudionOn = $audioOnOff;
        $player->sponsor_title = $sponsor_title;
        $player->outstrem_logo = $outstrem_logo;
        $player->decide_pre = $decide_pre;

        $imaUrlEmptyPlayerHide = "";

        if(!isset($imaUrl)){
            $imaUrlEmptyPlayerHide = "display:none !important;";
        }

        $iframeCodeIs = "<iframe id='$id' src='$url/player/$id/$id' onload='window.addEventListener(\"message\", function(e) {if(e.data.id == $id){ document.getElementById(\"$id\").style.display = e.data.dis;document.getElementById(\"$id\").style.height = e.data.height; } }, false);' scrolling='no' allowfullscreen frameborder='0'  style='$imaUrlEmptyPlayerHide height:1px;width:100%;'></iframe>";

        $player->iframe_code = $iframeCodeIs;
        $player->width = $width;
        $player->height = $height;
        
        if ($player->save()){
            
            return response()->json($iframeCodeIs);
           
        }else{
            return response()->json('Player create error');
        }
        
    }

    public function getInfo(Request $request)
    {
        $id = $request->id;
        $data = Player::where('id', $id)->first();
        return $data;
    }

    public function destroy($id)
    {
        $del = Player::find($id);
        $del->delete();

        $players = Player::all();
        // return view('playerList')->with('players',$players);
        return back()->with('players',$players);
    }
}
