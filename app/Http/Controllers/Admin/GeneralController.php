<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class GeneralController extends Controller
{
    //general index view return
    public function index(){

        return view('admin.pages.settings.index');
    }

    public function setting(){
        $edit = Setting::find(1);
        return view('frontend.settings.index',compact('edit'));
    }

    public function generalStore(Request $request){
        $setting = Setting::find(1);

        if ($request->hasFile('logo')){
            $logo = $request->file('logo');
            $unique_name = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->resize(241,53)->save('admin/setting/'.$unique_name);
            @unlink('admin/setting/'.$request->old_logo);

        }else{
            $unique_name = $request->old_logo;
        }

        $setting->logo = $unique_name;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->about = $request->about;
        $setting->update();

        $notification = array(
            'message' => 'General Setting updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
