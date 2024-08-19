<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->ProductImages->count())
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->ProductImages as $itemImg)
                                <li><img src="{{asset($itemImg->image)}}"/></li>
                                @endforeach
                              </ul>
                            </div>
                            
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>
                        @else 
                        No Image Available
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}</span>
                            <span class="original-price">{{$product->original_price}}</span>
                        </div>
                        @if($product->ProductColors->count() > 0)
                        @if($product->ProductColors)
                        @foreach ($product->ProductColors as $colorItem)
                            {{-- <input type="radio" value="{{$colorItem->id}}" wire:click="colorSelected({{$colorItem->id}})" /> {{$colorItem->color->name}} --}}
                            <label class="colorSelectionLabel" style="background-color: {{$colorItem->color->code}}" wire:click="ColorSelected({{$colorItem->id}})" >
                                {{$colorItem->color->name}}
                            </label>
                        @endforeach
                        @endif
                            <div>
                        @if($this->ProductColorSelectedQuantity == 'outOfStock')
                        <label class="btn-sm py-1 px-1 mt-2 text-white bg-success">Out of Stock</label>
                        @elseif($this->ProductColorSelectedQuantity > 0)
                        <label class="btn-sm py-1 px-1 mt-2 text-white bg-success">In Stock</label>
                        @endif    
                    </div>
                        @else
                        @if($product->quantity)
                        <label class="btn-sm py-1 px-1 mt-2 text-white bg-success">In Stock</label>

                        @else
                        <label class="btn-sm py-1 px-1 mt-2 text-white bg-danger">Out of Stock</label>
                        @endif

                        @endif
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="DecrementQuantity" ><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quanitityCount" value="{{$this->quanitityCount}}" class="input-quantity" readonly />
                                <span class="btn btn1" wire:click="IncrementQuantity" ><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1" >
                                 <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>


                            <button type="button" wire:click="addToWishList({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishList"> 
                                    <i class="fa fa-heart"></i> Add To Wishlist 
                                </span>
                                <span wire:loading wire:target="addToWishList">Adding...</span>
                                </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->small_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){

            $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay": false,
            "autoPlayTimeout": 2000
            
            });

});
    </script>
@endpush