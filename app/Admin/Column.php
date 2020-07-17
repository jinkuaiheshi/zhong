<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //
    protected $table = 'column';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
