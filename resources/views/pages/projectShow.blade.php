@extends('layouts.main-layout')

@section('content')

    <h1>
        {{ $project -> name }}
    </h1>

    <ul>
        <li>
            Description: {{ $project -> description }}
        </li>            
        <li>
            Release date: {{ $project -> release_date }}
        </li>
        <li>
            <a href="{{ $project -> repo_link }}">Repo Link</a>
        </li>
    </ul>
    
@endsection