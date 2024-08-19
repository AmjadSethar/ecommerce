<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;
use App\Models\Product;
class Index extends Component
{
    public $products , $category ,$brandsInputs = [] ,$priceInput;
    protected $queryString = [
        'brandsInputs' => ['excepts'=>'','as'=>'brand'],
        'priceInput' => ['excepts'=>'','as'=>'price'],
    ];
    public function mount($category)
    {
       
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
        ->when($this->brandsInputs,function($q){
            $q->whereIn('brand',$this->brandsInputs);
        })
        ->when($this->priceInput,function($q){

            $q->when($this->priceInput == 'high to low' ,function($sq2){
                $sq2->orderBy('selling_price','DESC');
            })
                ->when($this->priceInput == 'low to high' ,function($sq2){
                    $sq2->orderBy('selling_price','ASC');
                });
        })
        ->where('status','0')
        ->get();
        return view('livewire.frontend.products.index',[
            'products'=>$this->products,
            'category'=>$this->category
        ]);
    }
}
