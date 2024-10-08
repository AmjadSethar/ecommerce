<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    public function create()
    {
        
        return view('admin.colors.create');
    }

    public function store(ColorsFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','Color added Successfully');
        
    }

    public function edit($color_id)
    {
        $color = Color::findOrFail($color_id);
        return view('admin.colors.edit',compact('color'));
    }

    public function update(ColorsFormRequest $request, int $color_id)
    {
        $validatedData = $request->validated();
        $color = Color::findOrFail($color_id);
        $color->update([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? '1' : '0',
        ]);

        return redirect('admin/colors')->with('message','Color Updated Successfully');
        
    }

    public function destroyColor($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','Color Deleted Successfully');
    }
}
