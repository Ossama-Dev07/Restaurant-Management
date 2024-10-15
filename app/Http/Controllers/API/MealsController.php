<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Auth;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $meals = Meal::with('category')->get();
        return response()->json($meals, 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|max:255',
            'category_id'=>'required|integer|exists:meal_categorys,id',
            'is_available' => 'required|boolean',
            
        ]);
        $meal = Meal::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'is_available' => $request->is_available,
        ]);
        return response()->json( $meal, 201); 
    }

    public function show($id)
    {
        $meal = Meal::with('category')->findOrFail($id);
        return response()->json($meal, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|max:255',
            'category_id'=>'required|integer|exists:meal_categorys,id',
            'is_available' => 'required|boolean',
            
        ]);
        if ($meal) {
            $meal->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'is_available' => $request->is_available,
            ]);
            return response()->json($meal, 201);
        }
        return response()->json(["meal not found"], 501);
    }
    public function destroy($id)
    {
        Meal::destroy($id);
        return response()->json(['message' => "your meal has been deleted".$id], 201);
    }
}
