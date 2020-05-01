<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Company;
use App\ClientRequest;
use App\Uploads;
use Auth;

class StaffController extends Controller
{
    function clientlist()
    {
        if(Auth::guard('web')->user()->user_type == 'staff')
        {
            $data = Company::orderBy('created_date', 'DESC')->get();
            return view('auth.clientList', compact('data'));
        }
    	else
        {
            return view('errors.404');
        }
    }

    function userlist()
    {
        $data = User::where('user_type', '=', 'staff')
                    ->where('deleted', '=', 0)
                    ->get()
                    ->toArray();

        return view('auth.userlist', compact('data'));
    }

    function create()
    {
        return view('auth.create-client');
    }

    function save(Request $request)
    {
        $d = date("Y-m-d");

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect('/create/company')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $params = [
            'company_name' => $request->company_name,
            'address' => $request->address,
            'website' => $request->website,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
            'created_date' => $d,
            'starred_by' => '',
            'group_ids' => 1,
            'lead_status_id' => 1,
            'owner_id' => 1,
            'lead_source_id' => 1,
            'last_lead_status' => '',
            'client_migration_date' => $d,
            ];

            Company::insert($params);
            return redirect('/companylist')->with('success', 'Registered: '.$request->company_name.' '.'!');
        }
    }

    function publisherlist()
    {
        return view('auth.staff-publisherlist');
    }

    function create_publisher()
    {
      return view('auth.create-publisher');
    }

    function adlist()
    {
        return view('auth.staff-adlist');
    }

    function create_advertiser()
    {
      return view('auth.create-advertiser');
    }

    function websitelist()
    {
        return view('auth.staff-websitelist');
    }

    function feedlist()
    {
        return view('auth.staff-feedlist');
    }

    function create_user()
    {
        $data = Company::select('id', 'company_name')->get();
        return view('auth.create-user', compact('data'));
    }

    function create_user_post(Request $request)
    {
        // dd($request->all());
        // $date = date_create("2020-02-3");
        $d = date("Y-m-d h:i:s");

        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'job_title' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect('/create/user')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $params = [
            'client_id' => $request->company,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => '827ccb0eea8a706c4c34a16891f84e7b',
            'user_type' => $request->user_type,
            'gender' => $request->gender,
            'email' => $request->email,
            'job_title' => $request->job_title,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => $d,
            ];
            $company_name = Company::select('company_name')->where('id', '=', $request->company)->first();
            User::insert($params);
            return redirect('/userlist')->with('success-create-user', $request->first_name. ' '.$request->last_name.'('.$company_name['company_name'].')');
        }
    }

    function accept_vast_tag($id)
    {
        $client_id = ClientRequest::select('client_id')->where('id', $id)->first();

        $check_assets = Uploads::where('request_id', '=', $id)->first();

        if($check_assets == NULL)
        {
            return redirect('/home')->with('error', 'You Have Not Uploaded The Assets Yet! So, Please Upload The Assets First!');
        }
        else
        {
            $client_name = User::where('id', '=', $client_id['client_id'])->where('user_type', '=', 'client')->first();
            $client_company = Company::where('id', '=', $client_name['client_id'])->first();
    
            ClientRequest::where('id', $id)->update(['is_accepted' => 1]);
            return redirect('/home')->with('success-vast-tag', $client_name['first_name'].' '.$client_name['last_name'].' '.'('.$client_company['company_name'].')');
        }
    }

    function delete_vast_tag($id)
    {
        ClientRequest::where('id', $id)->delete();
        return redirect('/home')->with('info', 'Request deleted!');
    }

    function getrequestInfo(Request $request)
    {
        $data = ClientRequest::where('id', '=', $request->id)->first();
        return $data;
    }

    function create_vast_tag()
    {
        return view('home');
    }

    function asset_upload($id)
    {
        return view('auth.client_asset_upload', compact('id'));
    }

    function asset_upload_post(Request $request, $id)
    {
        $client_id = ClientRequest::select('client_id')->where('id', '=', $id)->first();

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

        $params = [
            'client_id' => $client_id['client_id'],
            'video_url' => $video,
            'poster_url' => $poster,
            'logo_url' => $logo,
            'request_id' => $id
        ];

        $client_name = User::join('clients', 'users.client_id', 'clients.id')
                                ->select('clients.company_name', 'users.first_name', 'users.last_name')
                                ->where('users.id', '=', $client_id['client_id'])
                                ->first();

        Uploads::insert($params);
        return view('auth.client_asset_links', compact('params', 'client_name'))->with('success', 'Assets has been uploaded Successfully!');
    }

    function assets_list()
    {
        $data = Uploads::join('users', 'asset_uploads.client_id', 'users.id')
                        ->join('clients', 'users.client_id', 'clients.id')
                        ->select('asset_uploads.id', 'asset_uploads.client_id', 'users.first_name', 'users.last_name', 'clients.company_name', 'asset_uploads.video_url', 'asset_uploads.logo_url', 'asset_uploads.poster_url', 'asset_uploads.created_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('auth.assets-list', compact('data'));
    }

    function asset_delete($id)
    {
        $files = Uploads::find($id);
        
        $logo = $files['logo_url'];
        $poster = $files['poster_url'];
        $video = $files['video_url'];

        if(file_exists(public_path('uploads/logo/'.$logo)))
        {
            unlink(public_path('uploads/logo/'.$logo));
        }
        if(file_exists(public_path('uploads/poster/'.$poster)))
        {
            unlink(public_path('uploads/poster/'.$poster));
        }
        if(file_exists(public_path('uploads/video/'.$video)))
        {
            unlink(public_path('uploads/video/'.$video));
        }
        else
        {
            return back()->wuth('error', 'Sorry, no assets found!');
        }
        Uploads::where('id', '=', $id)->delete();
        return redirect('/assets-list')->with('info', 'Assets has been delete!');
    }
}