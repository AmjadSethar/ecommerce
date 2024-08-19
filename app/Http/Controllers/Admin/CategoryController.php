<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        $valiodatedData = $request->validated();
        $category = new Category;
        $category->name = $valiodatedData['name'];
        $category->slug = Str::slug($valiodatedData['slug']);
        $category->description = $valiodatedData['description'];
        $uploadPath = 'uploads/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $category->image = $uploadPath.$fileName;
        }
        

        $category->meta_title = $valiodatedData['meta_title'];
        $category->meta_keywords = $valiodatedData['meta_keyword'];
        $category->meta_description = $valiodatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('admin/category')->with('message','Category Added Successfully');

    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$category){
        $category = Category::findOrFail($category);
        $valiodatedData = $request->validated();
        $category->name = $valiodatedData['name'];
        $category->slug = Str::slug($valiodatedData['slug']);
        $category->description = $valiodatedData['description'];
        $category->name = $valiodatedData['name'];
        if($request->hasFile('image')){

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $uploadPath = 'uploads/category/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $category->image = $uploadPath.$fileName;
        }
        

        $category->meta_title = $valiodatedData['meta_title'];
        $category->meta_keyword = $valiodatedData['meta_keyword'];
        $category->meta_description = $valiodatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('admin/category')->with('message','Category Updated Successfully');
    }
}
