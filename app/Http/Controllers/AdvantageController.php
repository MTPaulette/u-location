<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Dashboard/Add/Advantage", [
            'advantages' => Advantage::orderBy('name', 'asc')
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
        $advantage = new Advantage();
        $advantage->name = $request->advantage;

        $advantage->save();
        return redirect()->route('advantage.index')->with('success', 'advantage successfully created');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $advantage = Advantage::find($id);
        $advantage->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
