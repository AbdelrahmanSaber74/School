<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;

class Classroom extends Model
{

    protected $fillable = [
        'name_class_ar',
        'name_class_en',
        'grade_id',
    ];

    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo(Grade::class ,'grade_id');
    }


    public function Sections()
    {
        return $this->hasMany(Section::class ,'class_id');
    }
}
