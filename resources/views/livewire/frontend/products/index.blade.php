<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Brands</div>
                <div class="card-body">
                    @foreach ($category->brands as $Branditem)
                    <label class="d-block">
                    <input type="checkbox" wire:model="brandsInputs" value="{{$Branditem->name}}" /> {{$Branditem->name}}
                </label>
                @endforeach
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Price</div>
                <div class="card-body">
                    <label class="d-block">
                    <input type="radio" name="priceSort" wire:model="priceInput" value="high to low" /> High to Low 
                </label>
                <label class="d-block">
                    <input type="radio" name="priceSort" wire:model="priceInput" value="low to high" /> Low to High
                </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($product->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else 
                            <label class="stock bg-danger">Out of Stock</label>
                            @endif
                           @if ($product->productImages->count()>0)
                           <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                            
                            <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                        </a>    
                           @else
                               
                           @endif
                           
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->brand}}</p>
                            <h5 class="product-name">
                               <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                                    {{$product->name}} 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{$product->selling_price}}</span>
                                <span class="original-price">{{$product->original_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="p2">
                        <h5>No Products Available for {{$category->name}}</h5>
                    </div>
                </div>
            @endforelse
               </div>
        </div>
    </div>
   
</div>
