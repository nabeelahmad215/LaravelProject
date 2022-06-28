<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class reactResignationModel extends Model
{
    protected $table = 'tblresignation';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
