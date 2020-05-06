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
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    function clientlist()
    {
        if(Auth::guard('web')->user()->user_type == 'staff')
        {
            $data = Company::where('deleted', 0)->orderBy('created_date', 'DESC')->get();
            return view('auth.clientList', compact('data'));
        }
    	else
        {
            return view('errors.404');
        }
    }

    function userlist()
    {
        $data = User::where('deleted', '=', 0)
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
            'phone' => 'required|unique:clients'
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

    function company_edit($id)
    {
        $data = Company::find($id);
        return view('auth.client-edit', compact('data'));
    }

    function company_edit_post(Request $request, $id)
    {
        $data = Company::find($id);

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect('/company/edit/'.$id)
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
            'created_date' => $data->created_date,
            'starred_by' => '',
            'group_ids' => 1,
            'lead_status_id' => 1,
            'owner_id' => 1,
            'lead_source_id' => 1,
            'last_lead_status' => '',
            'client_migration_date' => $data->client_migration_date,
            ];

            Company::where('id', $id)->update($params);
            return redirect('/company/edit/'.$id)->with('success', 'Updated: '.$request->company_name.' '.'!');
        }
    }

    function company_delete($id)
    {
        Company::where('id', '=', $id)->update(['deleted' => 1]);
        return redirect('/companylist')->with('info', 'Client Has Been Deleted!');
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
            'email' => 'required|email|unique:users',
            'job_title' => 'required',
            'phone' => 'required|unique:users',
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

    function user_edit($id)
    {
        $data = Company::select('id', 'company_name')->get();
        $user_data = User::find($id);
        $company_id = $user_data->client_id;
        return view('auth.user-edit', compact('data', 'user_data', 'company_id'));
    }

    function user_edit_post(Request $request, $id)
    {
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
        ]);

        if ($validator->fails())
        {
            return redirect('/user/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $params = [
            'client_id' => $request->company,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_type' => $request->user_type,
            'gender' => $request->gender,
            'email' => $request->email,
            'job_title' => $request->job_title,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => $d,
            ];
            $company_name = Company::select('company_name')->where('id', '=', $request->company)->first();
            User::where('id', '=', $id)->update($params);
            return redirect('/user/edit/'.$id)->with('success-edit-user', $request->first_name. ' '.$request->last_name.'('.$company_name['company_name'].')');
        }
    }

    function user_delete($id)
    {
        User::where('id', '=', $id)->update(['deleted' => 1]);
        return redirect('/userlist')->with('info', 'User Has Been Deleted!');
    }

    function accept_vast_tag($id)
    {
        $client_id = ClientRequest::select('client_id')->where('id', $id)->first();
        $check_assets = Uploads::where('request_id', '=', $id)->first();
        $check_player = Player::where('request_id', '=', $id)->first();

        if($check_assets == NULL)
        {
            return redirect('/home')->with('error', 'You Have Not Uploaded The Assets Yet! So, Please Upload The Assets First!');
        }
        elseif($check_player == NULL)
        {
            return redirect('/home')->with('error', 'You Have Not Generated VAST Tag For This Request!');
        }
        else
        {
            $client_name = User::where('id', '=', $client_id['client_id'])->where('user_type', '=', 'client')->first();
            $client_company = Company::where('id', '=', $client_name['client_id'])->first();

            $to_name = $client_name['first_name'];
            $to_email = $client_name['email'];

            // $data = array('name'=> $to_name, "body" => "Your VAST Tag has been generated! Please check your Dashboard.");
            // Mail::send('auth.email.vast-email', $data, function($message) use ($to_name, $to_email) 
            // {
            //     $message->to($to_email, $to_name)->subject('VAST Tag Generated!');

            //     $message->from('govindaroy.ofc94@gmail.com','Govinda Roy');
            // });
    
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

    function create_vast_tag($id)
    {
        $request_id = $id;
        $client_id = ClientRequest::where('id', '=', $id)->first();
        $client_info = User::join('clients', 'users.client_id', 'clients.id')
                            ->where('users.user_type', '=', 'client')
                            ->select('users.id', 'users.first_name', 'users.last_name', 'clients.company_name')
                            ->orderBy('users.first_name')
                            ->get();

        return view('home', compact('client_info', 'request_id', 'client_id'));
    }

    function create_vast_tag2()
    {
        $client_info = User::join('clients', 'users.client_id', 'clients.id')
                            ->where('users.user_type', '=', 'client')
                            ->select('users.id', 'users.first_name', 'users.last_name', 'clients.company_name')
                            ->orderBy('users.first_name')
                            ->get();

        return view('home2', compact('client_info'));
    }

    function asset_upload($id)
    {
        $assets_data = Uploads::where('request_id', $id)->first();
        if($assets_data == NULL)
        {
            return view('auth.client_asset_upload', compact('id'));
        }
        else
        {
            $client_id = ClientRequest::select('client_id')->where('id', '=', $id)->first();
            $params = [
                'client_id' => $assets_data['client_id'],
                'video_url' => $assets_data['video_url'],
                'poster_url' => $assets_data['poster_url'],
                'logo_url' =>   $assets_data['logo_url'],
                'request_id' => $id
            ];

            $client_name = User::join('clients', 'users.client_id', 'clients.id')
                                ->select('clients.company_name', 'users.first_name', 'users.last_name')
                                ->where('users.id', '=', $client_id['client_id'])
                                ->first();

            return view('auth.client_asset_links', compact('params', 'client_name', 'id'))->with('success', 'Here are what you have been missing!');
        }
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
        return view('auth.client_asset_links', compact('params', 'client_name', 'id'))->with('success', 'Assets has been uploaded Successfully!');
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