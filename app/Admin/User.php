<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function Realname()
    {
        return $this->hasOne('App\Admin\Realname','uid','id');
    }
    public function Cash()
    {
        return $this->hasOne('App\Admin\Cash','uid','id');
    }
}
