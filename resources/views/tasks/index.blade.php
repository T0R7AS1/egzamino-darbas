@extends('layouts.admin')


@section('content')
<form action="{{route('tasks.index')}}" method="get">
    <fieldset>
        <legend>Filter tasks by status:</legend>
        <div class="inputs">
            <select class="form-control" name="status_id">
                <option value="0">Select status</option>
                @foreach ($statuses as $status)
                    <option value="{{$status->id}}" @if($status_id == $status->id) selected @endif>{{$status->name}}</option>
                @endforeach
            </select>
        </div>
    </fieldset>
    <button class="btn btn-primary mt-2" type="submit">Go</button>
    <a class="btn btn-primary mt-2" href="{{route('tasks.index')}}">Reset</a>
</form> <!--/.sort by -->
<div class="card m-0">
    <div class="card-header ">
      <h4 class="card-title d-inline-block"> Tasks Table</h4>
      <a href="{{ route('create.tasks')}}" class="btn btn-primary float-right mt-2">Add a new task</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-fixed">
          <thead class=" text-primary">
            <th> Task title</th>
            <th> Description </th>
            <th> Status </th>
            <th> Date added </th>
            <th> Date completed </th>
            <th class="text-right"> Actions </th>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
                <td> {{ $task->task_name}} </td>
                <td> {!! substr(strip_tags($task->task_description), 0, 25) !!}{{ strlen($task->task_description) > 40 ? "..." : ""}} </td>
                <td> {{ $task->statusName->name}} </td>
                <td> {{ $task->add_date}} </td>
                <td> {{ $task->completed_date}} </td>
                <td class="text-right">
                    <a href="{{ URL::to('show/tasks'.$task->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ URL::to('edit/tasks'.$task->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ URL::to('delete/tasks'.$task->id) }}" onclick="return confirm('Are u sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection