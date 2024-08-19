@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        <div class="card">
           <div class="card-header">
                <h4>Add Colors
                <a href="{{url('admin/colors')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                 @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <div class="alert alert-danger">{{$errors}}</div>
                    @endforeach
                @endif 
                <form action="{{url('admin/colors/create')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="">Color Name</label>
                        <input type="text" name="name" class="form-control border border-dark">
                    </div>
                    <div class="mb-3">
                        <label for="">Color Code</label>
                        <input type="text" name="code" class="form-control border border-dark">
                        
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