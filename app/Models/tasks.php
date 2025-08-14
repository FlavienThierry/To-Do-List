<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    public function tasks(){
        return $this->belongsTo(User::class);
    }
}
