<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    protected $table = 'cash';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
