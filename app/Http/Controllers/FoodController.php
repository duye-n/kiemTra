<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_food;


class FoodController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Create a new food record
        T_food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect back or wherever you want after saving
        return redirect()->back()->with('success', 'Food item created successfully!');
    }
}
