<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($id)
    {
        // Fetch the user by ID
        //$user = User::findOrFail($id);

        // Return the view with user data
        return view('users.show', compact('user'));
    }
}
