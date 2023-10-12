<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Models\CommunityReply;
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
            $communitys = Community::latest()->where('status',true)->paginate(10);
        }

        return view('user.pages.community.index' , compact('communitys' , 'btn'));
    }

     //single community post page return
     public function show(Community $community){
        $key = 'blog'.$community -> id.Auth::guard('web')->user()->id;

        if(Session::has($key)){}else{
            Session::put($key, 'yes');
             $community -> views = $community -> views + 1;
             $community -> save();
        }
        $rplies = CommunityReply::where('community_id', $community -> id)->with(['community','user'])->get();
        return view('user.pages.community.single' , compact(['community','rplies']));
    }

     // Store new community post in database
     public function store(CommunityRequest $request){
        // User data get based on Authenticate gurad user
        $user = Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::guard('web')->user();
        // Store post in community table
        Community::create([
            'title' => $request -> title, 'description' => $request -> description , 'user_id' => $user -> id,
        ]);
        // return success message
        return redirect()->back()->with('success' , 'Your Post Published Successfully!');
    }

     // Community Post Delete by Admin
     public function delete(Request $request){

        $community = Community::find($request->id);
        if($community->user_id == Auth::guard('web')->user()->id){
            $community -> delete();
            return redirect()->back()->with('error' , 'Post Deleted  Successfully!');
        }
        return redirect()->back()->with('error' , 'Sorry you are not eligiale for delete this post');
     }


     // Community Post Delete by Admin
     public function edit(Community $community){
        if($community->user_id == Auth::guard('web')->user()->id){
            return $community;
        }
        return false;
     }


     // Store new community post in database
     public function update(CommunityRequest $request){
        $community = Community::find($request->id);
        if($community->user_id == Auth::guard('web')->user()->id){
              // User data get based on Authenticate gurad user
            $user = Auth::guard('admin')->check() ? '' : Auth::guard('web')->user();
            // Store post in community table
            $community -> title = $request -> title;
            $community -> description = $request -> description;
            $community -> user_id = $user -> id;
            $community->update();

            // return success message
            return redirect()->back()->with('success' , 'Your Post Updated Successfully!');
        }
        return false;

    }

    // REply new community post in database
    public function reply(Request $request,Community $community){
        $request -> validate(['message' => 'required']);
        // User data get based on Authenticate gurad user
        $user = Auth::guard('admin')->check() ? '' : Auth::guard('web')->user();
        // Store post in community table

        CommunityReply::create([
            'description' => $request -> message , 'user_id' => $user -> id, 'community_id' => $community -> id
        ]);
        // return success message
        return redirect()->back()->with('success' , 'Your Reply Successfully Placed');
    }







}
