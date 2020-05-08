<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Company;
use App\ClientRequest;
use App\Uploads;
use App\Player;
use Auth;

class AssetController extends Controller
{
    function index()
    {
        return view('auth.assets.client_asset_upload');
    }

    function asset_upload(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'poster' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'video' => 'required'
        ]);

        $logo = time().'.'.$request->logo->extension();  
        $poster = time().'.'.$request->poster->extension();  
        $video = time().'.'.$request->video->extension();  

        

        $request->logo->move(public_path('uploads/logo'), $logo);
        $request->poster->move(public_path('uploads/poster'), $poster);
        $request->video->move(public_path('uploads/video'), $video);

        dd(getimagesize('uploads/video/'.$video));

        $params = [
            'client_id' => 0,
            'video_url' => $video,
            'poster_url' => $poster,
            'logo_url' => $logo,
            'request_id' => 0
        ];

        Uploads::insert($params);
        return view('auth.assets.client_asset_links', compact('params'))->with('success', 'Assets has been uploaded Successfully!');
    }
}
