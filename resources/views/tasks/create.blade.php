@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main class="bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <a href="{{ route('tasks.index')}}" class="btn btn-primary btn-block m-0 ">Back</a>
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add a task</h3></div>
                            <div class="card-body">
                                <form action="{{ route('tasks.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1" for="inputProjectname">Task name</label>
                                        <input type="text" class="form-control" placeholder="Enter a task title" name="task_name" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('task_name') Task name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">Description about a task</label>
                                        <textarea type="text" class="form-control" placeholder="Enter the description about a task" name="task_description"
                                        id="about" autocomplete="off"></textarea>
                                    </div>
                                    <div class="mb-3 text-danger"> 
                                        @error('task_description') Task description must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">Task status</label>
                                        <select name="status_id" id="" class="form-control">
                                            <option disabled> Select</option>
                                            @foreach ($statuses as $status)
                                            <option name="status_id" value="{{$status->id}}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('status_id') Task status must be selected @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputProjectname">Task starting date</label>
                                        <input type="date" class="form-control" name="add_date" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('add_date') Task starting date must be valid @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="inputProjectname">Task completion date</label>
                                        <input type="date" class="form-control" name="completed_date" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('completed_date') Task completion date must be valid @enderror
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block mt-4" name="add" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </main>
    </div>
</div>
<script src="{{URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
    tinyMCE.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: false
    });
</script>
@endsection