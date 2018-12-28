@extends('layout')
@section('content')
    <h1 class="title">Projects</h1>
    <ul class="content">
    @foreach ($projects as $project)
        <li>
            <h4 class="is-small"><a href="/projects/{{$project->id}}" class="link">
                {{ $project->title }}
            </a></h4>
        </li>
    @endforeach
    </ul>
@endsection