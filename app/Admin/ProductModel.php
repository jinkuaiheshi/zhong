<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    //
    protected $table = 'product_model';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
