<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false;

public function companionUser(){
    return $this->hasOne('App\Models\User', 'id', 'user_id');
}
}
