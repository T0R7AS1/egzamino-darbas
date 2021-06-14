@extends('layouts.admin')


@section('content')
<div class="card m-0">
    <div class="card-header ">
      <h4 class="card-title d-inline-block"> Statuses Table</h4>
      <a href="{{ route('create.statuses')}}" class="btn btn-primary float-right mt-2">Add a new status</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-fixed">
          <thead class=" text-primary">
            <th> Status name</th>
            <th class="text-right"> Actions </th>
          </thead>
          <tbody>
            @foreach($statuses as $status)
            <tr>
                <td> {{ $status->name}} </td>
                <td class="text-right">
                    <a href="{{ URL::to('edit/statuses'.$status->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ URL::to('delete/statuses'.$status->id) }}" onclick="return confirm('Are u sure?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $statuses->links() }}
      </div>
    </div>
</div>
@endsection