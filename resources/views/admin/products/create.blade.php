@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Products
                <a href="{{url('admin/products')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <ul class="nav nav-tabs my-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotags-tab" data-bs-toggle="tab" data-bs-target="#seotags-tab-pane" type="button" role="tab" aria-controls="seotags-tab-pane" aria-selected="false">SEO Tags</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                      </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Category</label>
                            <select name="category_id"  class="form-control text-dark">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected':''}}>{{$category->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Product Slug</label>
                            <input type="text" name="slug" id="" value="{{old('slug')}}" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Select Brand</label>
                            <select name="brand" id="" class="form-control text-dark">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->name}}" {{old('brand')== $brand->name ? 'selected':''}} >{{$brand->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Small Description (500 Words)</label>
                            <textarea name="small_description" id="" cols="5" rows="5" class="form-control border border-dark" >{{old('small_description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="5" rows="5" class="form-control border border-dark" >{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" value="{{old('meta_title')}}" id="" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" cols="5" rows="5" class="form-control border border-dark" >{{old('meta_description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" id="" cols="5" rows="5" class="form-control border border-dark" >{{old('meta_keyword')}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="number" value="{{old('original_price')}}" name="original_price" id="" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="number" name="selling_price" value="{{old('selling_price')}}" id="" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" value="{{old('quantity')}}" id="" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Featured</label>
                                    <input type="checkbox" name="featured">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control border border-dark" >
                            </div>
                        </div>
                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Select Color</label>
                                <div class="row">
                                    @forelse ($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                         Color: <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" />     {{$color->name}}
                                       <br>
                                       Quantity: <input type="number" name="colorquantity[{{$color->id}}]" style="width: 70px;border:1px solid;">
                                        </div>
                                    </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h6>No Color Found</h6>
                                        </div>
                                    @endforelse
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection