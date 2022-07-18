<?php

namespace App\Http\Controllers;

use App\Models\ClientDetails;
use App\Models\ProjectType;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientDetailsController extends Controller
{
    function show()
    {
         $project_type = ProjectType::all();
        $query_client = DB::table('clientdetails')
        ->join('project_type','clientdetails.p_id','=','project_type.id')
        ->select('clientdetails.*','project_type.project_type_name')
        ->get();
        return view("update.client_information",compact('project_type','query_client'));
    }

    function insert(request $Request)
  
    {
        $this->validate($Request,[
            "p_id"           => "required",
            "client_name"    => "required",
            "client_email"   => "required",
            "client_website" => "required",
            "client_phone"   => "required",
            "client_address" => "required",
            ],
            [
                'p_id.required'          => 'Please Select project Type',
                'client_name.required'   => 'Please Fill Up Name',
                'client_email.required ' => 'Please Fill Up Email',
                'client_website.required'=> 'Please Fill Up Website',
                'client_phone.required'  => 'Please Fill Up phone',
                'client_address.required'=> 'Please Fill Up address',
            ]
        );
         $user = DB::table('clientdetails')
        ->where('p_id', $Request->p_id)
        ->where('client_name', $Request->client_name)
        ->where('client_email', $Request->client_email)
        ->where('client_website', $Request->client_website)
        -> where('client_phone', $Request->client_phone)
        -> where('client_address', $Request->client_address)
        ->first();




        if($user===null ){

            $insert = new ClientDetails;

            $insert->p_id           = $Request->p_id;
            $insert->client_name    = $Request->client_name;
            $insert->client_website = $Request->client_website;
            $insert->client_email   = $Request->client_email;
            $insert->client_phone   = $Request->client_phone;
            $insert->client_address = $Request->client_address;
        
            $insert->save();
            return redirect('admin/show_client_details')->with('message', 'insert');

        }else
        {
            return redirect('admin/show_client_details')->with('message', 'exist');
        }
       
        
    }

    function update(request $Request){
        $this->validate($Request,[
            "p_id"           => "required",
            "client_name"    => "required",
            "client_email"   => "required",
            "client_website" => "required",
            "client_phone"   => "required",
            "client_address" => "required",
            ],
            [
                'p_id.required'          => 'Please Select project Type',
                'client_name.required'   => 'Please Fill Up Name',
                'client_email.required ' => 'Please Fill Up Email',
                'client_website.required'=> 'Please Fill Up Website',
                'client_phone.required'  => 'Please Fill Up phone',
                'client_address.required'=> 'Please Fill Up address',
            ]
        );
        
        $id = $Request->edit_client_name_id;
        $id = $Request->edit_client_website_id;
        $id = $Request->edit_client_email_id;
        $id = $Request->edit_client_phone_id;
        $id = $Request->edit_client_address_id;

        // $update = new ClientDetails;
        $update =  ClientDetails::find($id) ;
        $update->p_id           = $Request->p_id;
        $update->client_name    = $Request->client_name;
        $update->client_website = $Request->client_website;
        $update->client_email   = $Request->client_email;
        $update->client_phone   = $Request->client_phone;
        $update->client_address = $Request->client_address;
        $update->save();
        return redirect('admin/show_client_details')->with('message', 'edit');
        


        

           
        
    }
}
