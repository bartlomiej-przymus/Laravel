@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>

<form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 20px;">
        @csrf
        @method('PATCH')
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}">
            </div>
        </div>
        <div class="field">
            <label for="descriptipon" class="label">Description</label>
            <div class="control">
            <textarea name="description" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>
        @include('errors')
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
                <!-- <a href="#" class="button is-danger">Delete</a> -->
            </div>
        </div>
    </form>
<form action="/projects/{{$project->id}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-danger">Delete Project</button>
            </div>
        </div>
    </form>
@endsection