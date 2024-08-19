@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        <div class="card">
           <div class="card-header">
                <h4>Edit Slider
                <a href="{{url('admin/sliders')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                 @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <div class="alert alert-danger">{{$errors}}</div>
                    @endforeach
                @endif 
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title"  value="{{$slider->title}}" class="form-control border border-dark">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control border border-dark" rows="3">{{$slider->description}}</textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control border border-dark">
                        <img src="{{url($slider->image)}}" style="width: 90px;height: 70px" class="mt-2" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" name="status" {{$slider->status == '1'?'checked':''}} /> Checked = Hidden , Un-Checked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection