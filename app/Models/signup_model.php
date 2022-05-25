<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class signup_model extends Model {

    protected $table = 'employee_info';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function store(Request $request) {
        $userDM = new signup_model; //new mode
        $userDM->full_name = $request->name;
        $userDM->cnic = $request->cnic;
        $userDM->email = $request->email;
        $userDM->password = $request->password;
        $userDM->save();

}
}
