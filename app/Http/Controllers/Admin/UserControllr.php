<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserControllr extends Controller
{
     //member index page return
     public function index(){
        $admin_profile = Admin::findOrFail(1);
        $users = User::latest()->get();
        $roles = Role::where('status',true)->latest()->get();

        return view('admin.pages.user.index' , compact(['admin_profile' , 'users' , 'roles']));
    }

    // User Register by admin
    public function store(Request $request){
        // validate user data
        $request -> validate([
            'name' => 'required|max:100', 'email' => 'required|email|unique:users,email' , 'role' => 'required'
        ]);
        // Store data in database
        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'profession' => $request -> profession,
            'password' => Hash::make('user123456'),
        ]);
        // Attach Role in Povit TAble
        $roles = Role::find($request->role);
        $user->roles()->attach($roles);
        // return success message
        return redirect()->back()->with('success' , 'User Created Successfully!');
    }

    public function delete($id){
        $profile = User::findOrFail($id);
        $profile -> photo && unlinkFile('uploads/general/',$profile->photo);
        $profile->delete();
        return redirect()->back()->with('error','User Deleted Successfully!');

    }

    public function editUser($id){
        $roles = Role::latest()->get();
        $edit_users = User::find($id);
        return view('admin.pages.user.edit',compact('edit_users','roles'));
    }

    public function updateUser(Request $request,$id){


        $update = User::find($id);

        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(200,200)->save('admin/image/user/'.$unique_name);
        }else{
            $unique_name = $request->old_photo;
        }



        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->photo = $unique_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $user_id = $update->id;
        $roles = $request->role;

        if (isset($roles)) {
            $update->roles()->sync($roles);  //If one or more tags is selected associate blog to tagblog
        }
        else {
            $update->roles()->detach(); //If no tags is selected remove exisiting role associated to a blogs
        }

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert_type' => 'success',
        );

        return redirect()->route('admin.user.index')->with($notification);

    }













}
