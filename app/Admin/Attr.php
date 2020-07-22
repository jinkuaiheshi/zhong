<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    //
    protected $table = 'attr';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
