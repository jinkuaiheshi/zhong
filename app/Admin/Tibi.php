<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tibi extends Model
{
    //
    protected $table = 'tibi';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function User()
    {
        return $this->hasOne('App\Admin\User','id','uid');
    }
    public function Realname()
    {
        return $this->hasOne('App\Admin\Realname','uid','uid');
    }
}
