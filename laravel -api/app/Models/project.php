<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
    // app/Models/Project.php



