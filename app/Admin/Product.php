<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function Attr()
    {
        return $this->hasOne('App\Admin\Attr','id','attr');
    }
    public function ProductModel()
    {
        return $this->hasOne('App\Admin\ProductModel','id','model');
    }
}
