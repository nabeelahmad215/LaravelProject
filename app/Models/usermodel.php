<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class usermodel extends Model {

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function store (Request $request){
        $userDM = new user_detail_model;
        $userDM->username = $request->username;
        $userDM->email = $request->email;
        $userDM->save();
        
    }
}
?>