<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table = 'sms';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
