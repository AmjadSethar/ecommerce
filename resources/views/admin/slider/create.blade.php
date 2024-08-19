@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        <div class="card">
           <div class="card-header">
                <h4>Add Slider
                <a href="{{url('admin/sliders')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                 @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <div class="alert alert-danger">{{$errors}}</div>
                    @endforeach
                @endif 
                <form action="{{url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control border border-dark">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control border border-dark" rows="3"></textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control border border-dark">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" name="status" /> Checked = Hidden , Un-Checked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection