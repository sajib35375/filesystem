<?php

namespace App\Http\Controllers\Admin;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Models\CommunityReply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityRequest;
use Illuminate\Support\Facades\Session;

class CommunityController extends Controller
{
    //file ticket index page return
    public function index(Request $request){
        if($request->search){
            $communitys = Community::latest()->where('title' , 'like', "%{$request->search}%" )->orWhere('description' ,  'like', "%{$request->search}%"  )->paginate(10);
            $btn = true;
        }else{
            $btn = false;
            $communitys = Community::latest()->paginate(10);
        }

        return view('admin.pages.community.index' , compact('communitys','btn'));
    }


     //single community post page return
     public function show(Community $community){
        $key = 'blog'.$community -> id.Auth::guard('admin')->user()->id .'admin';
        if(Session::has($key)){}else{
            Session::put($key, 'yes');
             $community -> views = $community -> views + 1;
             $community -> save();
        }
        $rplies = CommunityReply::where('community_id', $community -> id)->with(['community','user'])->paginate(1);
        return view('admin.pages.community.single' , compact(['community','rplies']));
    }


    // Community status update
    public function status(Community $community){
        if($community -> status){
           $community -> status = false;
           $community->update();
            // return success message
            return redirect()->back()->with('success' , 'Post Status Inactive Successfully!');
        }else{
            $community -> status = true;
            $community->update();
            // return success message
            return redirect()->back()->with('success' , 'Post Status Active Successfully!');
        }

    }


    // Community Post Delete by Admin
    public function delete(Request $request){
       $community = Community::find($request->id);
       $community -> delete();
       return redirect()->back()->with('error' , 'Post Deleted  Successfully!');
    }



}
