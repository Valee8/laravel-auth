<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;


class MainController extends Controller
{
    public function home() {

        $projects = Project::all();

        return view('pages.home', compact('projects'));
    }

    public function privateHome() {
        return view('pages.private-home');
    }

    public function projectShow(Project $project) {
        return view('pages.projectShow', compact('project'));
    }

    public function projectDelete(Project $project) {

        $project -> delete();

        return redirect() -> route('home');
    }

    public function projectCreate() {
        
        return view('pages.projectCreate');
    }

    public function projectStore(Request $request) {

        $data = $request -> validate([

            'name' => 'required|unique:projects,name|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'url|unique:projects,main_image',
            'release_date' => 'date|before:today',
            'repo_link' => 'required||unique:projects,repo_link|string',

        ]);

        $project = new Project();

        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

        $project -> save();

        return redirect() -> route('home');
    }

    public function projectEdit(Project $project) {
        
        return view('pages.projectEdit', compact('project'));
    }

    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([

            'name' => 'required|unique:projects,name|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'url|unique:projects,main_image',
            'release_date' => 'date|before:today',
            'repo_link' => 'required||unique:projects,repo_link|string',

        ]);

        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

        $project -> save();

        return redirect() -> route('home');

    }
}
