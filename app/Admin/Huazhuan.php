<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Huazhuan extends Model
{
    //
    protected $table = 'huazhuan';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function User()
    {
        return $this->hasOne('App\Admin\User','id','uid');
    }
}
