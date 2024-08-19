@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        <div class="card">
           <div class="card-header">
                <h4>Edit Color
                <a href="{{url('admin/colors')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                 @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <div class="alert alert-danger">{{$errors}}</div>
                    @endforeach
                @endif 
                <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Color Name</label>
                        <input type="text" name="name" value="{{$color->name}}" class="form-control border border-dark">
                    </div>
                    <div class="mb-3">
                        <label for="">Color Code</label>
                        <input type="text" name="code" value="{{$color->code}}" class="form-control border border-dark">
                        
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" name="status" {{$color->status=='1'?'checked':''}} /> Checked = Hidden , Un-Checked = Visible
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