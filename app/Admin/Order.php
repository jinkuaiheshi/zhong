<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'order';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
