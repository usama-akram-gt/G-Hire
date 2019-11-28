<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title','description','file','catagory','deliverytime','budget','tags','userid_fk'
    ];
}
