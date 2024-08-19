<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\File;
use App\Models\Color;
use App\Models\ProductColor;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create',compact('categories','brands','colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::FindOrFail($validatedData['category_id']);
       $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'featured' => $request->featured == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i =1;
            foreach($request->file('image') as $imageFile){
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if($request->colors)
        {
            foreach($request->colors as $key => $color)
            {
                $product->ProductColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0

                ]);
            }
        }
        return redirect('admin/products')->with('message','Product Added Successfully');
        
    }

    public function edit(int $product_id)
    {
        
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::FindOrFail( $product_id);
        $product_color = $product->ProductColors->pluck('color_id')->toArray(); 
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit',compact('product','categories','brands','colors'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
        ->products()->where('id',$product_id)->first();
        if($product){
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'featured' => $request->featured == true ? '1' : '0',
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);
            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                $i =1;
                foreach($request->file('image') as $imageFile){
                    $ext = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$ext;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            
        if($request->colors)
        {
            foreach($request->colors as $key => $color)
            {
                $product->ProductColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0

                ]);
            }
        }
            return redirect('admin/products')->with('message','Product Updated Successfully');
        }else{
            return redirect('admin/products')->with('message','No Such Product ID Found');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImages = ProductImages::findOrFail($product_image_id);
        if(File::exists($productImages->image)){
            File::delete($productImages->image);
        }
        $productImages->delete();
        return redirect()->back()->with('message','Product Image Deleted Successfully');
  
    }

    public function destroyProduct(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->ProductImages){
            foreach($product->ProductImages  as $image){
              if(File::exists($image->image)){
                File::delete($image->image);
              }
            }
        }
        $product->delete();
        return redirect('admin/products')->with('message','Product Deleted With All Images');
        
    }

    public function UpdateProdColorQty(Request $request, $product_color_id)
    {
        $productColorData = Product::FindOrFail($request->product_id)
        ->ProductColors()->where('id',$product_color_id)->first();
        $productColorData->update([
            'quantity'=>$request->qty
        ]);
        return response()->json(['message'=>'Quantity Updated']);
    }

    public function DeleteProdColorQty($product_color_id)
    {
        $prodColor = ProductColor::findOrFail($product_color_id);
        $prodColor->delete();
        return response()->json(['message'=>'Color Deleted']);
    }
}
