<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_section_ar',
        'name_section_en',
        'status',
        'grade_id',
        'class_id',

    ];

    public function Grades()
    {
        return $this->belongsTo(Grade::class ,'grade_id');
    }

    public function Classrooms()
    {
        return $this->belongsTo(Classroom::class ,'class_id');
    }

}
