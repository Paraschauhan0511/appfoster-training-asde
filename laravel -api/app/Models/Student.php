<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Student extends Model
{
    
    public $timestamps=false;
    protected $fillable = ['name', 'username', 'email','phone','website','companyname'];

    // Define the relationship with the Project model
    public function projects()
    {
        return $this->hasMany(Project::class, 'student_id');
    }
}