@extends('layout')

@section('content')
    <h1 class="title">{{$project->title}}</h1>
    <div class="content">{{$project->description}}
        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit Project</a>
        </p>
    </div>
    <h3 class="subtitle">Tasks</h3>
@if ($project->tasks->count())
<div class="box">
    @foreach ($project->tasks as $task)
        <form action="/completed-tasks/{{$task->id}}" method="POST">
            @if ($task->completed)
                @method('DELETE')
            @endif
            {{-- @method('PATCH') removed cos we have seperate controller now--}}
            @csrf
            <label for="completed" class="checkbox {{$task->completed ? 'is-complete has-text-success' : 'has-text-danger'}}">
                <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                {{ $task->description }}
            </label>
        </form>
    @endforeach
</div>
@endif
    <form action="/projects/{{$project->id}}/tasks" method="POST" class="box">
        @csrf
        <div class="field">
            <label for="description" class="label">New Task</label>
            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
        
        @include('errors')

    </form>
    <form action="/projects/{{$project->id}}/tasks" method="POST" class="box">
        @csrf
        @method('DELETE')
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-danger">Clear Tasks</button>
            </div>
        </div>
    </form>
@endsection