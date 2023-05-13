<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // field apa saja yg nilainy tidak boleh diisi dr luar

    // merelasikan tabel course dengan tabel type_course
    public function type_course()
    {
        return $this->belongsTo(TypeCourse::class, 'course_type_id', 'id' );
    }
}
