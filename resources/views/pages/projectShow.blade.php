@extends('layouts.main-layout')

@section('content')

    <h1 class="pb-4">
        Name project: {{ $project -> name }}
    </h1>

    @if ($project -> description !== null)
        <h3>
            Description: {{ $project -> description }}                          
        </h3> 
    @endif  
    <h3>
        Release date: {{ $project -> release_date }}
    </h3>
    <h3>
        <a href="{{ $project -> repo_link }}" target="_blank">Repo Link</a>
    </h3>
    
@endsection