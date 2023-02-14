@extends('layouts.main-layout')

@section('content')

    <h1>
        Projects
    </h1>

    @auth
        <h2 class="pb-4">
            <a href="{{ route('admin.project.create') }}" class="text-decoration-none">Create new Project</a>
        </h2>
    @endauth

    <div class="d-flex pb-5 flex-wrap" id="home-container">
        @foreach ($projects as $project)
            <div class="bg-light p-3 rounded-2 shadow-sm" id="project">
                <img class="project-img" src="{{ Vite::asset('storage/app/public/' . $project -> main_image) }}" alt="{{ $project -> name }}">
                <a href="{{ route('project.show', $project) }}" class="fw-bold">{{ $project -> name }}</a>  
                @auth
                    - <a href="{{ route('admin.project.edit', $project) }}">Edit</a>
                    - <a href="{{ route('admin.project.delete', $project) }}">Delete</a>
                @endauth
            </div>
        @endforeach
        </div>
    
@endsection