<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //允許一次寫入多個屬性
    protected $fillable = ['title', 'description', 'is_completed', 'user_id'];
}
