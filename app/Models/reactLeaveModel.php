<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class reactLeaveModel extends Model
{

    protected $table = 'tblleave';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
