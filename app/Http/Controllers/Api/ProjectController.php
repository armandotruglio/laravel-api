<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with("technologies", "type")->get();

        return response()->json([
            "success" => "true",
            "results" => $projects,
        ]);
    }
}