@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
        <div class="card">
           <div class="card-header">
                <h4>Add User
                <a href="{{url('admin/users')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/users')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Select Role</label>
                            <select name="role_as" class="form-control">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                            @error('role_as')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 text-end">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection