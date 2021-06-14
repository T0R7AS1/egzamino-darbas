@extends('layouts.admin')

@section('content')
    <div class="container mt-5 jumbotron text-center">
        <div id="invoice">
        <p class="h5" ><b>Task title:</b> <br> {{$tasks->task_name}}</p>
        <p class="h5" ><b>Task description:</b> <br>{!!$tasks->task_description!!}</p>
        <p class="h5" ><b>Task status: </b> <br>{{ $tasks->statusName->name}}</p>
        <p class="h5" ><b>Task added:</b> <br>{!!$tasks->add_date!!}</p>
        <p class="h5" ><b>Task completed:</b> <br>{{$tasks->completed_date}}</p>
        <hr>
        </div>
    <a href="/edit/tasks{{$tasks->id}}" class="btn btn-warning">Edit</a>
    <a href="{{ URL::to('delete/tasks'.$tasks->id) }}" onclick="return confirm('Are u sure?')" class="btn btn-danger">Delete</a>
    <a href="{{ route('tasks.index')}}" class="btn btn-primary"> Back</a>
    </div>
@endsection