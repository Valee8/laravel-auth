@extends('layouts.main-layout')

@section('content')

    <h1>
        Projects
    </h1>

    <h2>
        <a href="{{ route('project.create') }}">Create new Project</a>
    </h2>

    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('project.show', $project) }}">{{ $project -> name }}</a> - 
                <a href="{{ route('project.delete', $project) }}">Delete</a> - 
                <a href="{{ route('project.edit', $project) }}">Edit</a>
            </li>
        @endforeach
    </ul>
    
@endsection