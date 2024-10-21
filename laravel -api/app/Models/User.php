<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false; // Set to true if you want to use timestamps
    protected $fillable = ['name', 'username', 'email', 'phone_number', 'website', 'company_name'];


}
