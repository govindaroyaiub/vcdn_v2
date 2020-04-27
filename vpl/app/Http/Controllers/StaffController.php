<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Company;
use App\ClientRequest;
use Auth;


class StaffController extends Controller
{
    function clientlist()
    {
        if(Auth::guard('web')->user()->user_type == 'staff')
        {
            $data = User::join('clients', 'users.client_id', '=', 'clients.id')
                    ->select('users.email', 'clients.company_name', 'clients.address', 'clients.city', 'clients.state', 'clients.zip', 'clients.country', 'clients.website')
                    ->get();
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
                    ->get()->toArray();

        return view('auth.userlist', compact('data'));
    }

    function create()
    {
        return view('auth.create-client');
    }

    function save(Request $request)
    {
        $date = date_create("2020-02-3");
        $d = date_format($date,"Y-m-d");

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
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
            'client_migration_date' => $d
            ];

            Company::insert($params);
            return redirect('/create/company')->with('success', 'Registered Sucessfully!');
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

    function accept_vast_tag($id)
    {
        ClientRequest::where('id', $id)
                    ->update(['is_accepted' => 1]);
        return redirect('/home')->with('success', 'Request accepted!');
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
}
