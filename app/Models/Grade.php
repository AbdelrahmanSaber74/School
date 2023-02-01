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


    public function Sections()
    {
        return $this->hasMany(Section::class ,'grade_id');
    }

    public function Classrooms()
    {
        return $this->hasMany(Classroom::class ,'grade_id');
    }




}
