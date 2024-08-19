<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;
class View extends Component
{
    public $category , $product , $ProductColorSelectedQuantity, $quanitityCount = 1 ,$productColorId;

    public function addToWishList($ProductId)
    {
       if(Auth::check()){
        if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$ProductId)->exists()){
           // session()->flash('message','Already Added to Wishlist');
            $this->dispatchBrowserEvent('message',
            ['text'=> 'Already Added to Wishlist',
            'type'=> 'success',
            'status' => 409
        ]);
            return false;
        }else{
            Wishlist::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$ProductId,
            ]);
            $this->emit('wishistAddedUpdated');
            //session()->flash('message','Wishlist Added Successfully');
            $this->dispatchBrowserEvent('message',
            ['text'=> 'Wishlist Added Successfully',
            'type'=> 'warning',
            'status' => 200
        ]);
        }
        
       }else{
        //session()->flash('message','Please Login to Continue');
        $this->dispatchBrowserEvent('message',
        ['text'=> 'Please Login to Continue',
        'type'=> 'info',
        'status' => 401
    ]);
        return false;
       }
    }

    public function ColorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor =  $this->product->ProductColors()->where('id',$productColorId)->first();
        $this->ProductColorSelectedQuantity = $productColor->quantity;
        if($this->ProductColorSelectedQuantity == 0){
            $this->ProductColorSelectedQuantity = 'Out of Stock';
        }
    }

    
    public function IncrementQuantity()
    {
        if($this->quanitityCount < 10){
            $this->quanitityCount++;
        }
        
    }

    public function DecrementQuantity()
    {
        if($this->quanitityCount > 1){
            $this->quanitityCount--;
        }
        
    }


    public function addToCart(int $ProductId)
    {
        if(Auth::check())
        {
           // dd( $ProductId);
           if($this->product->where('id',$ProductId)->where('status','0')->exists())
           {
            // check for product color quantity and add to cart
            if($this->product->ProductColors()->count()>1)
            {
                //dd('am product color inserted');
                if($this->ProductColorSelectedQuantity != NULL )
                {

                if(Cart::where('user_id',auth()->user()->id)
                ->where('product_id',$ProductId)
                ->where('product_color_id',$this->productColorId)
                ->exists())
                {
                    $this->dispatchBrowserEvent('message',
                    ['text'=> 'Product Already Added',
                    'type'=> 'warning',
                    'status' => 200
                ]);   
                }
                else
                {
                      $productColor = $this->product->ProductColors()->where('id',$this->productColorId)->first();
                    if($productColor->quantity > 0)
                    {
                        if($productColor->quantity > $this->quanitityCount)
                        {
                            // insert product to cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $ProductId,
                                'product_color_id' => $this->productColorId,
                                'quantity' =>  $this->quanitityCount
                            ]);
                            $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',
                                ['text'=> 'Product Added to Cart',
                                'type'=> 'success',
                                'status' => 200
                            ]);   

                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',
                                    ['text'=> 'Only '.$productColor->quantity.' Quantity Available',
                                    'type'=> 'warning',
                                    'status' => 404
                                ]);   
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',
                        ['text'=> 'Out of Stock',
                        'type'=> 'warning',
                        'status' => 404
                    ]);   
                    }
                }
                }
                else
                {
                    $this->dispatchBrowserEvent('message',
                            ['text'=> 'Select your product color',
                            'type'=> 'info',
                            'status' => 404
                        ]);  
                }
            }
            else
            {
                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$ProductId)->exists())
                {
                    $this->dispatchBrowserEvent('message',
                    ['text'=> 'Product Already Added',
                    'type'=> 'warning',
                    'status' => 200
                ]);   
                }
                else
                {
                    if($this->product->quantity > 0)
                    {
                        if($this->product->quantity > $this->quanitityCount)
                        {
                            // insert product to cart
                            //dd(' i am without color add to cart');
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $ProductId,
                                'quantity' =>  $this->quanitityCount
                            ]);
                                 $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message',
                                ['text'=> 'Product Added to Cart',
                                'type'=> 'success',
                                'status' => 200
                            ]);   
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',
                                    ['text'=> 'Only '.$this->product->quantity.' Quantity Available',
                                    'type'=> 'warning',
                                    'status' => 404
                                ]);   
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',
                                ['text'=> 'Out of Stock',
                                'type'=> 'warning',
                                'status' => 404
                            ]);   
                    }
                }
               
            }
            //dd('added');
           
           }
           else
           {
            $this->dispatchBrowserEvent('message',
                ['text'=> 'Product does not Exists',
                'type'=> 'warning',
                'status' => 404
            ]);
           }  
        }
        else
        {
            $this->dispatchBrowserEvent('message',
            ['text'=> 'Please Login To Continue',
            'type'=> 'info',
            'status' => 401
        ]);
        }
    }


    public function mount($category,$product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category'=>$this->category,
            'product'=>$this->product,
        ]);
    }
}
