<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'the file should be in one of the formats: jpg, png, jpeg, webp'
            ]);

            if(isset($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            
            foreach ($request->file('images') as $file){
                $path = $file->store('images/user', 'public');
                $user->image = $path;
            }
        }

        $user->update();
        
        return redirect()->back()->with('success', 'profile image uploaded!!!');
        // return to_route('profile')->with('success', 'images successfully added!!!');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userImage)
    {
        $user = Auth::user();
        Storage::disk('public')->delete($user->image);
        $user->image = null;
        $user->update();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
