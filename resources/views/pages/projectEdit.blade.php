@extends('layouts.main-layout')

@section('content')

    <h1>
        Edit Project
    </h1>

    <form method="POST" action="{{ route('admin.project.update', $project) }}" enctype="multipart/form-data">
        @csrf

        <label for="name">Name: </label>
        <input type="text" name="name" value={{ $project -> name}}>
        <br>
        <label for="description">Description: </label>
        <textarea type="text" name="description" value={{ $project -> description }}></textarea>
        <br>
        <label for="main_image">Image: </label>
        <input type="file" name="main_image" value={{ $project -> main_image }}>
        <br>
        <label for="release_date">Release Date: </label>
        <input type="date" name="release_date" value={{ $project -> release_date}}>
        <br>
        <label for="repo_link">Repo Link: </label>
        <input type="url" name="repo_link" value={{ $project -> repo_link}}>
        <br>
        <input type="submit" value="UPDATE">
    
    </form>

@endsection