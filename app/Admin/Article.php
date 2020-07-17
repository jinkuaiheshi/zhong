<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'article';
    public $timestamps = false;
    protected $primaryKey = 'id';

}
