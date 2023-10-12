<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Community extends Model
{
    use HasFactory;

    protected $guarded = [];

    // user and community table relationship 1 community have 1 user
    public function user(){
        return $this -> belongsTo(User::class);
    }

    // reply and community table relationship 1 community have many reply
    public function replies(){
        return $this -> hasMany(CommunityReply::class);
    }
}
