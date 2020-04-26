<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\URL;
use Auth;
use App\User;
use App\ClientRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_type = Auth::guard('web')->user()->user_type;

        if($user_type == 'client')
        {
            $vast_tag_list = User::join('players', 'users.id', '=', 'players.client_id')
                                ->where('users.user_type', '=', 'client')
                                ->orderBy('players.created_at', 'DESC')
                                ->get();
            $total_vast_tags = User::join('players', 'users.id', '=', 'players.client_id')
                                ->where('users.user_type', '=', 'client')
                                ->get()
                                ->count();
            $pending_requests = ClientRequest::where('client_id', '=', Auth::user()->id)
                                ->where('is_accepted', '=', 0)
                                ->get()
                                ->count();
            
            return view('auth.client', compact('vast_tag_list', 'total_vast_tags', 'pending_requests'));
        }
        elseif($user_type == 'staff')
        {
            $male_employees = User::where('gender', '=', 'male')
                                ->where('user_type', '=', 'staff')
                                ->where('deleted', '=', 0)
                                ->get()->count();

            $female_employees =  User::where('gender', '=', 'female')
                                    ->where('user_type', '=', 'staff')
                                    ->where('deleted', '=', 0)
                                    ->get()->count();

            $employees_account_active = User::where('user_type', '=', 'staff')
                                            ->where('deleted', '=', 0)
                                            ->where('status', '=', 'active')
                                            ->get()
                                            ->count();
            return view('auth.staff', compact('male_employees', 'female_employees', 'employees_account_active'));
        }
        else
        {
            return view('error.400');
        }
    }

    public function SavePlayer(Request $request){
        $input = $request->all();
        \Log::info($input);
        $url = config('app.base_url');
        
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

        $player = new Player;

        $player->name = $name;
        $player->src = $srcUrl;
        $player->imaUrl = trim($imaUrl);
        $player->logo = $logoUrl;
        $player->poster = $posterUrl;
        $player->color = $color;
        $player->islogoshow = $logoOnOff;
        $player->isAudionOn = $audioOnOff;
        $player->sponsor_title = $sponsor_title;
        $player->outstrem_logo = $outstrem_logo;
        $player->decide_pre = $decide_pre;
        $player->iframe_code = "";
        $player->width = $width;
        $player->height = $height;
        $imaUrlEmptyPlayerHide = "";

        if(!isset($imaUrl)){
            $imaUrlEmptyPlayerHide = "display:none !important;";
        }
        if ($player->save()){
            $last_id = $player->id;
            $iframeCodeIs = "<iframe id='$last_id' src='$url/player/$last_id/$last_id' onload='window.addEventListener(\"message\", function(e) {if(e.data.id == $last_id){ document.getElementById(\"$last_id\").style.display = e.data.dis; document.getElementById(\"$last_id\").style.height = e.data.height;} }, false);' scrolling='no' allowfullscreen frameborder='0'  style='$imaUrlEmptyPlayerHide height:1px;width:100%;'></iframe>";
            $playerUpdate = Player::find($last_id);
            if($playerUpdate) {
                $playerUpdate->src = $srcUrl;
                $playerUpdate->iframe_code = $iframeCodeIs;
                if($playerUpdate->save()) {
                    return response()->json($iframeCodeIs);
                }else{
                    return response()->json("iframe code update error");
                }
            }
        }else{
            return response()->json('Player create error');
        }
        
    }

}