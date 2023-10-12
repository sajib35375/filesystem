<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|max:255|string',
            'email' => Auth::guard('admin')->check() ? 'required|email|unique:admins,email,'. $this ->id : 'required|email|unique:users,email,'. $this ->id,
            'phone' => 'nullable|max:30',
            'profession' => 'nullable|max:100',
            'fb_link'  => 'nullable|url',
            'twitter_link'  => 'nullable|url',
            'linkdin_link'  => 'nullable|url',
            'photo'   => 'nullable||mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ];
    }
}
