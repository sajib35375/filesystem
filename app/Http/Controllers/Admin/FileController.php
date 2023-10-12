<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FileController extends Controller
{
     //file ticket index page return
     public function index(){
         $all_file = File::with('role')->latest()->get();
         $all_dept = Role::all();
         return view('admin.pages.tickets.index',compact('all_dept','all_file'));
    }

    // Single file ticket show
    public function show(){
        return view('admin.pages.tickets.single');
    }


    public function fileStore(Request $request){
         $this->validate($request,[
             'name' => 'required',
             'email' => 'required',
             'title' => 'required',
             'message' => 'required'
         ]);


         if ($request->hasFile('file')){
             $file = $request->file('file');
             $unique_name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
             $file->move('admin/file/',$unique_name);
         }



         File::insert([
             'role_id' => $request->dept,
             'title' => $request->title,
             'short_text' => $request->short_text,
             'name' => $request->name,
             'email' => $request->email,
             'message' => $request->message,
             'file' => $unique_name,
             'created_at' => Carbon::now(),
         ]);


        $notification = array(
            'message' => 'File Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    public function singleFile($id){
         $single_file = File::with('role')->find($id);
         return view('admin.pages.tickets.single_view',compact('single_file'));
    }

    public function FileDownload($file){
         return response()->download('admin/file/'.$file);
    }

    public function FileFilter($id){

        $all_file = File::with('role')->where('role_id','LIKE',"%$id%")->get();
        return json_encode($all_file);
    }

    public function FileShowAll(){
         $all_file = File::with('role')->latest()->get();

         return json_encode($all_file);

    }

    public function fileEdit($id){
         $edit_role = Role::all();
         $edit = File::find($id);
         return view('admin.pages.tickets.file_edit',compact('edit','edit_role'));
    }

    public function fileUpdate(Request $request,$id){
        $update = File::find($id);

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $unique_name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move('admin/file/',$unique_name);
            @unlink('admin/file/'.$request->old_file);
        }else{
            $unique_name = $request->old_file;
        }

        $update->role_id = $request->dept;
        $update->title = $request->title;
        $update->short_text = $request->short_text;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->message = $request->message;
        $update->file = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'File Updated Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


    public function fileDelete($id){
         $delete_file = File::find($id);
         $delete_file->delete();

        $notification = array(
            'message' => 'File Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




}
