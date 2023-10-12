<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityReply extends Model
{
    use HasFactory;

    protected $guarded = [];

    // reply and community table relationship 1 reply  have 1 community
    public function community(){
        return $this -> belongsTo(Community::class);
    }


    // user and reply table relationship 1 community have 1 user
    public function user(){
        return $this -> belongsTo(User::class);
    }
}
