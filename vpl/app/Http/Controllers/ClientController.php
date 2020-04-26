<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\ClientRequest;

class ClientController extends Controller
{
    function request_vast_tag()
    {
        return view('auth.client_request_vast_tag');
    }

    function post_vast_tag(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'url' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect('/request-vast-tag')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $params = [
                'decide_pre' => $request->DecidePER,
                'sponsor_title' => $request->SponsorTitle,
                'outstrem_logo' => $request->OutstremLogo,
                'isAudionOn' => $request->audio,
                'islogoshow' => $request->logoOnOff,
                'color' => $request->color,
                'url' => $request->url,
                'comment' => $request->comment,
                'is_accepted' => '0',
                'client_id' => Auth::user()->id,
            ];
    
            ClientRequest::insert($params);
            return redirect('/request-vast-tag')->with('success', 'Requested Sucessfully!');
        }
    }
}
