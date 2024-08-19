@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                <a href="{{url('admin/category')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control border border-dark">
                  @error('name')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{$category->slug}}" class="form-control  border border-dark">
                    @error('slug')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                  </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control border border-dark">{{$category->description}}</textarea>
                @error('description')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Image</label>
                    <input type="file" name="image" id="image" class="form-control border border-dark">
                    <img src="{{url('uploads/category/'.$category->image)}}" width="60px" height="60px" alt="">
                    @error('image')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Status</label>
                    <br>
                    <input type="checkbox" name="status" id="status" {{$category->description== '1' ? 'checked' : ''}} >
                  </div>
              </div>
              <div class="form-group">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{$category->meta_title}}" class="form-control  border border-dark">
                @error('meta_title')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" id="" cols="10" rows="5" class="form-control border border-dark">{{$category->meta_keyword}}</textarea>
                @error('meta_keyword')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="form-group">
                <label for="">Meta Description</label>
                <textarea name="meta_description" id="" cols="10" rows="5" class="form-control border border-dark">{{$category->meta_description}}</textarea>
                @error('meta_description')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <button type="submit" class="btn btn-primary text-white">Update</button>
            </form>
        </div>
        
@endsection