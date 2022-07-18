<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectTypeController extends Controller
{
    public function show()
    {
        $query_project_type = ProjectType:: all();
        return view('update.project_type',compact('query_project_type'));
    }

    public function insert(request $request)
    {
        $this->validate($request,
        [
            "project_type_name" => "required",
        ],
        [
            'project_type_name.required'=> 'Please,Fill up Project Type Name',
        ]);

        
        $same_value = DB::table('project_type')  
        ->where('project_type_name', $request->project_type_name)
        ->first();

        if($same_value!=null){
           
            return redirect('admin/show_project_type')->with('message', 'exist');
        }else
        {
            $insert = new ProjectType ;
            $insert->project_type_name= $request->project_type_name ;
            $insert->save();
            return redirect('admin/show_project_type')->with('message', 'inserted');
        }

    }

    public function update(request $request){
        $this->validate($request,
        [
            "project_type_name" => "required",
        ],
        [
            'project_type_name.required'=> 'Please,Fill up Project Type Name',
        ]);

        $id = $request->edit_id;
        $same_value = DB::table('project_type')  
        ->where('project_type_name', $request->project_type_name)
        ->first();

        if($same_value!=null){
           
            return redirect('admin/show_project_type')->with('message', 'exist');
        }else
        {
            $update =  ProjectType::find($id) ;
            $update->project_type_name= $request->project_type_name ;
            $update->save();
            return redirect('admin/show_project_type')->with('message', 'inserted');
        }

    }

    public function delete ($id){
        ProjectType::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }

}
