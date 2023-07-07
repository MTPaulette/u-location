<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Dashboard/Add/Ingredient", [
            'ingredients' => Ingredient::orderBy('name', 'asc')
                                    ->get()
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->ingredient;

        $ingredient->save();
        return redirect()->route('ingredient.index')->with('success', 'ingredient successfully created');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        if($request->ingredient) {
            $ingredient->name = $request->ingredient;
        }
        $ingredient->update();
        return redirect()->back()->with('success', 'ingredient updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
