@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main class="bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <a href="{{ route('statuses.index')}}" class="btn btn-primary btn-block m-0 ">Back</a>
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add a status</h3></div>
                            <div class="card-body">
                                <form action="{{ route('statuses.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1" for="inputProjectname">Status name</label>
                                        <input type="text" class="form-control" placeholder="Enter a status name" name="name" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('name') Status name must be valid @enderror
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