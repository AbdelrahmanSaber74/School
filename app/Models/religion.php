<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class religion extends Model
{
    use HasFactory;
    protected $table = 'religions';

    protected $fillable = [
        'name_ar',
        'name_en',
    ];


}
