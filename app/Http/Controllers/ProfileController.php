<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Image;

class ProfileController extends Controller
{
    // Authrnticate User Profile Update view Return
    public function ProfileView(){
        // Check which user is log in Admin or User then send user info
        $profile = Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::guard('web')->user();
        return view('user.pages.profile.profile' , compact(['profile']));
    }

    // Auth user profile info update
    public function profileUpdate(Request $request){
          //User Find From User Or Admin Table based on Auth::guard->check()
          $user_data =  Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::guard('web')->user();
          // Image Update through function
            if ($request->hasFile('photo')){
                $img = $request->file('photo');
                $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(300,300)->save('admin/image/user/'.$unique_name);
                if ($user_data->photo){
                    unlink('admin/image/user/'.$request->old_photo);
                }
            }else{
                $unique_name = $request->old_photo;
            }
          // Update profile information
          $user_data -> name = $request -> name;
          $user_data -> email = $request -> email;
          $user_data -> phone = $request -> phone;
          $user_data -> profession = $request -> profession;
          $user_data -> fb_link = $request -> fb_link;
          $user_data -> twitter_link = $request -> twitter_link;
          $user_data -> linkdin_link = $request -> linkdin_link;
          $user_data -> photo = $unique_name;
          $user_data -> update();

          return redirect()->back()->with('success','Profile Updated Successfully');
    }

    // Auth user password change
    public function passwordChange(PasswordRequest $request){
        $user =  Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::guard('web')->user();
        if(Hash::check($request -> old_password, $user->password) == false){
            return redirect()->back()->with('error','Old Password Not Match');
        }else{
            $user -> password = bcrypt($request->password);
            $user -> update();
            Auth::guard('admin')->check() ? Auth::guard('admin')->logout() : Auth::guard('web')->logout();
            return redirect()->route('login')->with('success','Password Successfully Changed');
        }
    }

    // logout Auth user
    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success' , 'Logout Successfully');
        }else{
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('success' , 'Logout Successfully');
        }
    }
}
