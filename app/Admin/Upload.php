<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table = 'upload';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function Realname()
    {
        return $this->hasOne('App\Admin\Realname','uid','uid');
    }
    public function User()
    {
        return $this->hasOne('App\Admin\User','id','uid');
    }
}
