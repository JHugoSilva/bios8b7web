<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['page_id', 'view_date'];
    public $timestamps = false;
}
