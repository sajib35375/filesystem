<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $guard = 'admin';

    protected $hidden = [
        'password' , 'remember_token' ,
    ];


}
