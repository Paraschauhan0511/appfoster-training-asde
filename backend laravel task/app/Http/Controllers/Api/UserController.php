<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get all users
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    // Create a new user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    // Get a specific user
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        return response()->json($user, 200);
    }

    // Update a specific user
    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' ,
        ]);

        $user->update($validatedData);
        return response()->json($user, 200);
    }

    // Delete a specific user and their projects
    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return response()->json(null, 204);
    }
}
