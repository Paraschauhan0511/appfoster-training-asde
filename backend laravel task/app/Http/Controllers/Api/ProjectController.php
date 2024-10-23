<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Get all projects of a specific user
    public function listPro($user_id)
    {
        $user = User::findOrFail($user_id);
        return response()->json($user->projects, 200);
    }

    // Create a new project for a specific user
    public function storePro(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $project = $user->projects()->create($validatedData);
        return response()->json($project, 201);
    }

    // Get a specific project
    public function showPro($user_id, $project_id)
    {
        $project = Project::where('user_id', $user_id)->findOrFail($project_id);
        return response()->json($project, 200);
    }

    // Update a specific project
    public function updatePro(Request $request, $user_id, $project_id)
    {
        $project = Project::where('user_id', $user_id)->findOrFail($project_id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $project->update($validatedData);
        return response()->json($project, 200);
    }

    // Delete a specific project
    public function deletePro($user_id, $project_id)
    {
        $project = Project::where('user_id', $user_id)->findOrFail($project_id);
        $project->delete();
        return response()->json(null, 204);
    }
}
