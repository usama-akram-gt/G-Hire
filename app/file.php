<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable = [
    	'name',
    	'size',
    	'project_id',
    	'userid_fk'
    ];
}
