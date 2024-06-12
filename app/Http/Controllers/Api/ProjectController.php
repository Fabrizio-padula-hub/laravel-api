<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'technologies')->get();
        
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug){
        $projects = Project::where('slug', '=', $slug)->with('type', 'technologies')->first();
        
        if($projects){
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'no project found with this slug'
            ]);
        }
        
    }
}
  