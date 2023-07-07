<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Dashboard/Add/Theme", [
            'themes' => Theme::orderBy('name', 'asc')
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
        $theme = new Theme();
        $theme->name = $request->theme;

        $theme->save();
        return redirect()->route('theme.index')->with('success', 'theme successfully created');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        if($request->theme) {
            $theme->name = $request->theme;
        }
        $theme->update();
        return redirect()->back()->with('success', 'theme updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);
        $theme->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
