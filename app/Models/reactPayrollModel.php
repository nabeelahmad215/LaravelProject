<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class reactPayrollModel extends Model
{

    protected $table = 'tblpayroll';
    protected $primaryKey = 'id';
    public $timestamps = false;

}