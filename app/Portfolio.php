<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'birth-month','birth-day','birth-year','university','university-country','level1','specialization','education-from-month','education-from-year','education-to-month','education-to-year','education-language','experience-company','experience-position','education-from-month-experience','education-from-year-experience','education-to-month-experience','education-to-year-experience','experience-description','resume','source','availability','additional-info', 'email'
    ];
}
