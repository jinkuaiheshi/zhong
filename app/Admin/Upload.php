<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table = 'upload';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
