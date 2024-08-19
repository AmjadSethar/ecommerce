@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                <a href="{{url('admin/category/create')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name" class="form-control border border-dark">
                  @error('name')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control  border border-dark">
                    @error('slug')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                  </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control border border-dark"></textarea>
                @error('description')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Image</label>
                    <input type="file" name="image" id="image" class="form-control border border-dark">
                    @error('image')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Status</label>
                    <br>
                    <input type="checkbox" name="status" id="status">
                  </div>
              </div>
              <div class="form-group">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control  border border-dark">
                @error('meta_title')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" id="" cols="10" rows="5" class="form-control border border-dark"></textarea>
                @error('meta_keyword')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="meta_description" id="" cols="10" rows="5" class="form-control border border-dark"></textarea>
                @error('meta_description')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <button type="submit" class="btn btn-primary text-white">Save</button>
            </form>
        </div>
        
@endsection