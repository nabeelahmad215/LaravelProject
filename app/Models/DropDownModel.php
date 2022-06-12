<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DropDownModel extends Model
{
    protected $table = 'user_react';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
