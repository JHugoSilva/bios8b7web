<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{

    protected $fillable = ['link_id', 'click_date'];
    public $timestamps = false;
}
