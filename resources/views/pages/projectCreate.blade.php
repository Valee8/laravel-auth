@extends('layouts.main-layout')

@section('content')

    <h1>
        Create new Project
    </h1>

    <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data" class="w-25">
            @csrf
            <label for="name" class="col-form-label">Name</label>
            <input type="text" name="name" class="form-control mb-2">

            <label for="description" class="col-form-label">Description</label>
            <textarea type="text" name="description" class="form-control mb-2"></textarea>

            <label for="main_image" class="col-form-label">Image</label>
            <input type="file" name="main_image" class="form-control mb-2">

            <label for="release_date" class="col-form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control mb-2">

            <label for="repo_link" class="col-form-label">Repo Link</label>
            <input type="url" name="repo_link" class="form-control mb-3">

            <input type="submit" class="btn btn-primary" value="CREATE">
    </form>

@endsection