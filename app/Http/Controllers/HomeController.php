<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Models\CommunityReply;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // Community post send
         $communities = Community::where('status' , true)->latest()->take(2)->select(['id','title','description'])->with('replies')->get();
         // Total User
         $user_count = User::count();
         // File Count
         $files = File::count();
         // Community Count
         $community_count = Community::where('status' , true)->count();
         // Reply Count
         $reply_count = CommunityReply::count();





        return view('user.pages.home.index' , compact('communities' , 'user_count' , 'files' , 'community_count' , 'reply_count'));
    }
}
