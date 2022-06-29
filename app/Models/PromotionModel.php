<?php

namespace App\Models;

// session_start();

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PromotionModel extends Model
{

    protected $table = 'tblpromotion';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
