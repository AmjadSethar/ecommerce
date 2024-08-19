@extends('layouts.app')
@section('title','Home')
    

@section('content')

 
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    @foreach ($sliders as $key => $slider)
    <div class="carousel-inner">
      <div class="carousel-item {{$key== '0' ? 'active' : ''}}" data-bs-interval="5000">
        @if ($slider->image)
        <img src="{{asset("$slider->image")}}" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
          <div class="custom-carousel-content">
            <h1>
              {!!$slider->title!!}
            </h1>
            <p>
              {!!$slider->description!!}
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Get Now
                </a>
            </div>
        </div>
        </div> 
        @endif
      
      </div>
    </div>
    @endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    
</div>
   

  <div class="py-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h4>Welcome to E-com</h4>
          <div class="underline mx-auto"></div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum distinctio minus veritatis facilis iure similique, assumenda qui sed officiis impedit rem illum quasi quis ab commodi iste corporis repellat minima id perferendis libero! Mollitia accusantium officia similique voluptate nesciunt. Enim labore quos alias vero voluptates voluptas dolorem cumque ratione commodi?</p>
        </div>
      </div>
    </div>
  </div>

  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Featured Products</h4>
          <div class="underline mb-4"></div>
        </div>
        @if ($featuredProduct)
        <div class="col-md-12">
          <div class="owl-carousel owl-theme four-carousel">
        @foreach ($featuredProduct as $product)
        <div class="item">
          <div class="product-card" >
                        <div class="product-card-img">
                           <label class="stock bg-success">New</label>
                           @if ($product->productImages->count()>0)
                           <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                            <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                        </a>    
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
            @endforeach
          </div>
        </div>
           @else
            <div class="col-md-12">
              <div class="p2">
                  <h5>No Featured Products Available</h5>
              </div>
          </div>
      </div>
      @endif
    </div>
</div>


<div class="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>New Arrivals</h4>
        <div class="underline mb-4"></div>
      </div>
      @if ($newArrivals)
      <div class="col-md-12">
        <div class="owl-carousel owl-theme four-carousel">
      @foreach ($newArrivals as $product)
      <div class="item">
        <div class="product-card">
                      <div class="product-card-img">
                         <label class="stock bg-success">New</label>
                         @if ($product->productImages->count()>0)
                         <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                          <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                      </a>    
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
          @endforeach
        </div>
      </div>
         @else
          <div class="col-md-12">
            <div class="p2">
                <h5>No New Arrivals Products Available</h5>
            </div>
        </div>
    </div>
    @endif
  </div>
</div>


<div class="py-5 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Trending Products</h4>
        <div class="underline mb-4"></div>
      </div>
      @if ($trendingProducts)
      <div class="col-md-12">
        <div class="owl-carousel owl-theme four-carousel">
      @foreach ($trendingProducts as $product)
      <div class="item">
        <div class="product-card" >
                      <div class="product-card-img">
                         <label class="stock bg-success">New</label>
                         @if ($product->productImages->count()>0)
                         <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
                          <img src="{{asset($product->productImages[0]->image)}}" alt="{{$product->name}}">
                      </a>    
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
          @endforeach
        </div>
      
      </div>
      @else
      <div class="col-md-12">
        <div class="p2">
            <h5>No Trending Products Available</h5>
        </div>
    </div>
      
      @endif
        
    </div>
   
  </div>
</div>

@endsection

@section('script')
    <script>
     $(document).ready(function() {
      $('.four-carousel').owlCarousel({

        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
        })

    setTimeout(function(){
        $(".owl-carousel").owlCarousel()
    },
    2000);
});
       
     
    </script>
@endsection