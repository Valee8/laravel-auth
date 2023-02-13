<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Project;


class MainController extends Controller
{
    public function home() {

        $projects = Project::all();

        return view('pages.home', compact('projects'));
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

            'name' => 'required|min:3|unique:projects,name|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required||unique:projects,repo_link|string',

        ]);

        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project = Project::create($data);

        // $project = new Project();

        // $project -> name = $data['name'];
        // $project -> description = $data['description'];
        // $project -> main_image = $data['main_image'];
        // $project -> release_date = $data['release_date'];
        // $project -> repo_link = $data['repo_link'];

        $project -> save();

        return redirect() -> route('home');
    }

    public function projectEdit(Project $project) {
        
        return view('pages.projectEdit', compact('project'));
    }

    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([

            'name' => 'required|min:3|unique:projects,name|string|max:64,' . $project -> id,
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link,' . $project -> id,

        ]);

        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        // $project -> name = $data['name'];
        // $project -> description = $data['description'];
        // $project -> main_image = $data['main_image'];
        // $project -> release_date = $data['release_date'];
        // $project -> repo_link = $data['repo_link'];

        $project -> update($data);
        $project -> save();

        return redirect() -> route('home');

    }
}