@extends('layout')

@section('content')
    <h1 class="title">Create New Project</h1>
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ old('title')}}" required>
            </div>
        </div>
        <div class="field">
            <label for="descriptipon" class="label">Description</label>
            <div class="control">
                <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
                <!-- <a href="#" class="button is-danger">Delete</a> -->
            </div>
        </div>
        @include('errors')
    </form>
@endsection