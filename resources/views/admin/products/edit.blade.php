@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Products
                <a href="{{url('admin/products')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
            </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <h6 class="alert alert-success text-center">{{session('message')}}</h6>
                @endif
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category_id? 'selected'  :''}}>
                                    {{$category->name}}
                                </option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" id="" value="{{$product->name}}" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Product Slug</label>
                            <input type="text" name="slug" id="" value="{{$product->slug}}" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Select Brand</label>
                            <select name="brand" id="" class="form-control" >
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->name}}" {{$brand->name == $product->brand ?'selected':'' }}>
                                    {{$brand->name}}
                                </option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Small Description (500 Words)</label>
                            <textarea name="small_description" id="" cols="5" rows="5" class="form-control border border-dark" >{{$product->small_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="5" rows="5" class="form-control border border-dark" >{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" id="" value="{{$product->meta_title}}" class="form-control border border-dark" >
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" cols="5" rows="5" class="form-control border border-dark" >{{$product->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" id="" cols="5" rows="5" class="form-control border border-dark" >{{$product->meta_keyword}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="number" name="original_price" value="{{$product->original_price}}" id="" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="number" name="selling_price" id="" value="{{$product->selling_price}}" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" id="" value="{{$product->quantity}}" class="form-control border border-dark" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Featured</label>
                                    <input type="checkbox" name="featured" {{$product->featured == '1'? 'checked':''}} >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending" {{$product->trending == '1'? 'checked':''}} >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" {{$product->status =='1'?'checked':''}} >
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control border border-dark" >
                            </div>
                          <div class="mb-2 border">
                            @if ($product->productImages)
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                <div class="col-md-2">
                                    <img src="{{asset($image->image)}}" style="width: 80px;height:80px" class="me-4" alt="Image">
                                    <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="btn btn-danger btn-sm mt-2">Remove</a>
                                </div>
                                @endforeach
                            </div>
                            @else
                                <h6>No Image Added</h6>
                            @endif
                          </div>
                        </div>

                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label for="">Select Color</label>
                                <hr>
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
                          <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <td>Color Name</td>
                                        <td>Quantity</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->ProductColors as $prodColor)
                                    <tr class="prod_color_tr">
                                        <td>
                                            @if($prodColor->color)
                                            {{$prodColor->color->name}}
                                            @else
                                            No Color Found
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group mb-3"  style="width: 150px">
                                                <input type="text" value="{{$prodColor->quantity}}" class=" productColorQuantity form-control form-control-sm border border-dark ">
                                                <button type="button" value="{{$prodColor->id}}" class="UpdateProductColorbtn btn btn-primary btn-sm text-white">Update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$prodColor->id}}" class="deleteProductColorbtn btn btn-danger btn-sm text-white">Delete</button>
                                        </td>
                                    </tr>    
                                    @endforeach
                                    
                                </tbody>
                            </table>
                          </div>
                        </div>

                    </div>
                   <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           $(document).on('click','.UpdateProductColorbtn',function(){
            var product_id = '{{$product->id}}'
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod_color_tr').find('.productColorQuantity').val()
            // alert(prod_color_id)

            if(qty<=0){
                alert('Quantity is required')
                return false;
            }

            var data ={
                'product_id': product_id,
                'qty': qty
            }

            $.ajax({
                type: 'POST',
                url: '/admin/product-color/'+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            })


           });
           $(document).on('click','.deleteProductColorbtn',function(){
            var prod_color_id = $(this).val()
            var thisClick = $(this)
            //var product_id = '{{$product->id}}'
            //prod_color_id = $(this).closest('prod_color_tr')
            //alert(product_id)
            
            $.ajax({
                type:'GET',
                url:'/admin/product-color/'+prod_color_id+'/delete',
                success: function(response){
                    thisClick.closest('.prod_color_tr').fadeOut('slow')
                    
                }

           })
           })
        });
    </script>
@endsection