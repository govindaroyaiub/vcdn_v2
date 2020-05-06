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
        $user_id = Auth::user()->id;
        
        if($user_type == 'client')
        {
            $pending_requests = ClientRequest::where('is_accepted', '=', 0)
                                            ->where('client_id', '=', $user_id)
                                            ->get()
                                            ->count();
            
            $vast_tag_list = Player::join('client_request', 'players.request_id', 'client_request.id')
                                    ->where('players.client_id', '=', $user_id)
                                    ->where('client_request.is_accepted', '=', 1)
                                    ->get();
                                    
            $total_vast_tags = Player::join('client_request', 'players.request_id', 'players.request_id')
                                    ->where('players.client_id', '=', $user_id)
                                    ->where('client_request.is_accepted', '=', 1)
                                    ->get()
                                    ->count();
            
            return view('auth.client', compact('vast_tag_list', 'total_vast_tags', 'pending_requests'));
        }
        elseif($user_type == 'staff')
        {
            $current_year = date('Y');
            
            $total_vast_tags = Player::whereYear('created_at', $current_year)->get()->count();
            $pending_requests = ClientRequest::where('is_accepted', '=', 0)->get()->count();
            $approved_requests = ClientRequest::where('is_accepted', '=', 1)->get()->count();

            $request_jan = Player::whereMonth('created_at', '1')->whereYear('created_at', $current_year)->count();
            $request_feb = Player::whereMonth('created_at', '2')->whereYear('created_at', $current_year)->count();
            $request_mar = Player::whereMonth('created_at', '3')->whereYear('created_at', $current_year)->count();
            $request_apr = Player::whereMonth('created_at', '4')->whereYear('created_at', $current_year)->count();
            $request_may = Player::whereMonth('created_at', '5')->whereYear('created_at', $current_year)->count();
            $request_june = Player::whereMonth('created_at', '6')->whereYear('created_at', $current_year)->count();
            $request_july = Player::whereMonth('created_at', '7')->whereYear('created_at', $current_year)->count();
            $request_aug = Player::whereMonth('created_at', '8')->whereYear('created_at', $current_year)->count();
            $request_sep = Player::whereMonth('created_at', '9')->whereYear('created_at', $current_year)->count();
            $request_oct = Player::whereMonth('created_at', '10')->whereYear('created_at', $current_year)->count();
            $request_nov = Player::whereMonth('created_at', '11')->whereYear('created_at', $current_year)->count();
            $request_dec = Player::whereMonth('created_at', '12')->whereYear('created_at', $current_year)->count();

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

            $client_requests = ClientRequest::join('users', 'client_request.client_id', 'users.id')
                                            ->join('clients', 'users.client_id', 'clients.id')
                                            ->select('clients.company_name', 'client_request.id', 'users.first_name', 'users.last_name', 'client_request.url', 'client_request.comment', 'client_request.created_at')
                                            ->where('users.user_type', '=', 'client')
                                            ->where('is_accepted', 0)
                                            ->orderBy('client_request.created_at', 'DESC')
                                            ->get();

            return view('auth.staff', compact(
            'male_employees', 
            'female_employees', 
            'employees_account_active', 
            'client_requests', 
            'pending_requests',
            'approved_requests',
            'total_vast_tags',
            'current_year',
            'request_jan',
            'request_feb',
            'request_mar',
            'request_apr',
            'request_may',
            'request_june',
            'request_july',
            'request_aug',
            'request_sep',
            'request_oct',
            'request_nov',
            'request_dec'));
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
        $client_id = $input['client_id'];
        $request_id = $input['request_id'];

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
        $player->client_id = $client_id;
        $player->request_id = $request_id;
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