<?php

namespace App\Models;

session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class userModel extends Model
{
    protected $table = 'employee_info';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function store(Request $request)
    {
        $obj = new userModel; //new mode
        $obj->email = $request->email;
        $obj->password = $request->password;
    }
}
