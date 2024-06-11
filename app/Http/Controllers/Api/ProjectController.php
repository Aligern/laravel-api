<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        // dd($projects);
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $projects
        ],200);
    }

    public function show($id) {
        $project = Project::where('id', $id)->with('type', 'technologies')->first();
        if ($project) {
            return response()->json([
                'status' => true,
                'message' => 'Project found',
                'results' => $project
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Project not found'
            ],404);
        }
        
    }
}
