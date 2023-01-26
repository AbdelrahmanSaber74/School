<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'notes',
    ];

    protected $table = 'Grades';
    public $timestamps = true;

}
