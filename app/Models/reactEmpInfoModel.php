<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class reactEmpInfoModel extends Model {

    protected $table = 'employee_info';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
