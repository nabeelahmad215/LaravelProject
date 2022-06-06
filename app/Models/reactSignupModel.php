<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class reactSignupModel extends Model {

    protected $table = 'user_react';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function store(Request $request) {
        $userDM = new reactSignupModel; //new mode
        $userDM->company = $request->input('name');
        $userDM->mobile = $request->input('mobile');
        $userDM->cnic = $request->input('cnic');
        $userDM->email = $request->input('email');
        $userDM->password = $request->input('password');
        $userDM->save();

}
}
