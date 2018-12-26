@extends('layout')

@section('content')
    <h1 class="title">{{$project->title}}</h1>
    <div class="content">{{$project->description}}</div>
    <p>
        <a href="/projects/{{ $project->id }}/edit">Edit Project</a>
    </p>
    @if ($project->tasks->count())
        @foreach ($project->tasks as $task)
            <ul>
                <li>{{ $task->description }}</li>
            </ul>        
        @endforeach
    @endif
    <!-- implementing adding tasks
    <form action="" method="post">
        
    </form>
    -->
@endsection