<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_food;
use Illuminate\Http\RedirectResponse;



class FoodController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Validate form data
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //     ]);

    //     // Create a new food record
    //     T_food::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //     ]);

        // Redirect back or wherever you want after saving
    //     return redirect()->back()->with('success', 'Food item created successfully!');
    // }
    public function create()
    {
        return view('foods.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Kiểm tra dữ liệu nhập đủ hay không
        // if (!$request->filled(['description', 'model', 'produced_on'])) {
        //     return redirect()->back()->withInput()->withErrors('Vui lòng nhập đầy đủ thông tin.');
        // }
        $request->validate([
            'name' => 'required',
            'new_price' => 'required',
            'old_price' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'image' => "required"
        ], [
            'name.required' => 'name không được để trống',
            'new_price.required' => 'new_price không được để trống',
            'old_price.required' => 'old_price không được để trống',
            'detail.required' => 'detail không được để trống',
            'category.required' => 'category không được để trống',
            'image.required' => 'image không được để trống'
        ]);

        $food = new T_food;
        $food->name = $request->input('name');
        $food->new_price = $request->input('new_price');
        $food->old_price = $request->input('old_price');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $food->image = $filename;
        }

        $food->detail = $request->input('detail');
        $food->category_id = $request->input('category');
        $food->save();

        return redirect('/foods')->with('success', 'Đã thêm mới thành công.');
    }

}
