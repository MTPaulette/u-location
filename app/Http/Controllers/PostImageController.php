<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as ImageManager;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $post->load(['images']);
        return Inertia("Dashboard/Post/PostImage/Create", [
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Post $post, Request $request)
    {
        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'the file should be in one of the formats: jpg, png, jpeg, webp'
            ]);

            foreach ($request->file('images') as $file){
                $path = $file->store("images/post/{$post->id}", 'public');
                $post->images()->save(new Image([
                    'filename' => $path
                ]));
            }
        }
        
        return back()->with('success', 'images uploaded!!!');
    }

    public function store(Post $post, Request $request)
    {
        $text = 'www.agrimax.com';
        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'the file should be in one of the formats: jpg, png, jpeg, webp'
            ]);

            foreach ($request->file('images') as $file){
                
                $file_name = time().'_'.$file->getClientOriginalName();
                $img = ImageManager::make($file);

                $img->resize(1386,790);
                $img->text($text,300,700,function($font){
                    $font->file(public_path().DIRECTORY_SEPARATOR.'font'.DIRECTORY_SEPARATOR.'Roboto'.DIRECTORY_SEPARATOR.'Roboto-Regular.ttf');
                    $font->size(100);
                    $font->color("#f7941d");
                    $font->align("left");
                    $font->valign("bottom");
                    $font->angle(30);
                });
                
                $path = 'images'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.$post->id.DIRECTORY_SEPARATOR.$file_name;
                $fullpath = public_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.$post->id;
                if(!file_exists($fullpath)) {
                    mkdir($fullpath, 0777, true);
                }

                $img->save(public_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.$path, 100);
                $post->images()->save(new Image([
                    'filename' => $path
                ]));
            }
        }
        
        return back()->with('success', 'images uploaded!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post, Image $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
