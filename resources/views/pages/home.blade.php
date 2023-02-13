@extends('layouts.main-layout')

@section('content')

    <div class="container pt-5">
        <h1>
            Projects
        </h1>
    
        @auth
            <h2>
                <a href="{{ route('admin.project.create') }}" class="text-decoration-none">Create new Project</a>
            </h2>
        @endauth
    
        <div class="row pt-5 pb-5" id="home-container">
            @foreach ($projects as $project)
                <div class="col-4">
                    <img class="project-img" src="{{ Vite::asset('storage/app/public/' . $project -> main_image) }}" alt="{{ $project -> name }}">
                    <a href="{{ route('project.show', $project) }}" class="text-decoration-none">{{ $project -> name }}</a>  
                    @auth
                        - <a href="{{ route('admin.project.edit', $project) }}" class="text-decoration-none">Edit</a>
                        - <a href="{{ route('admin.project.delete', $project) }}" class="text-decoration-none">Delete</a>
                    @endauth
                </div>
            @endforeach
         </div>
    </div>
    
@endsection