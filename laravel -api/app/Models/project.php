<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Assuming your projects table is correctly named as 'projects'
  
    public $timestamps=false;
    protected $fillable = ['user_id', 'title','body'] ;

    // Define the inverse relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}