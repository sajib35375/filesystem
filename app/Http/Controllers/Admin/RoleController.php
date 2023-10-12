<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     //role index page rerurn
     public function index(){
         $all_role = Role::latest()->get();
        return view('admin.pages.role.index',compact('all_role'));
    }

    public function roleStore(Request $request){
         $this->validate($request,[
             'role_name' => 'required'
         ]);

        Role::insert([
            'role_name' => $request->role_name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Role Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function roleActive($id){
        $active = Role::find($id);
        $active->status = true;
        $active->update();

        $notification = array(
            'message' => 'Role Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function roleInactive($id){
         $inactive = Role::find($id);
         $inactive->status = false;
         $inactive->update();

        $notification = array(
            'message' => 'Role Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function EditDepartment($id){
        return $edit_dept = Role::find($id);
    }

    public function UpdateDepartment(Request $request){
        $id = $request->update_id;
        $role_update = Role::find($id);
        $role_update->role_name = $request->department;
        $role_update->updated_at = Carbon::now();
        $role_update->update();

        $notification = array(
            'message' => 'Department Updated Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteDepartment($id){
         $delete_data = Role::find($id);
         $delete_data->delete();

        $notification = array(
            'message' => 'Department Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
