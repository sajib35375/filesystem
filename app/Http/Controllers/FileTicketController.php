<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileTicketController extends Controller
{
    //file ticket index page return
    public function index(){
         $id = Auth::guard('web')->user()->id;
         $role_id = User::find($id)->roles()->get();
         $array = [];
         foreach($role_id as $role){
             array_push($array , $role -> id);
         }
         $files = File::whereIn('role_id',$array)->get();
        return view('user.pages.tickets.index' , compact('files'));
    }

    // Single file ticket show
    public function show($id){
        $single_file = File::find($id);
        return view('user.pages.tickets.single',compact('single_file'));
    }

    public function FileDownload($file){
        return response()->download('admin/file/'.$file);
   }

   public function singleFile($id){
    $single_file = File::with('role')->find($id);
    return view('user.pages.tickets.single_view',compact('single_file'));
}

}
