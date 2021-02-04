<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function form () {
    	return view('form');
    }

    public function add_post (PostRequest $request) {
    	$post = new Post();
    	$post->user_name = $request->user_name;
    	$post->title = $request->title;
    	$post->description = $request->description;

    	if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images/uploads/', $name)) {
                $post->image = 'images/uploads/' . $name;
            }
        }

        $post->save();

        return redirect()->route('index')->with('success', 'Post added successfully');
    }

    public function get_posts () {
        return Post::all();
    }

    public function move_images () {
        $posts = Post::get();

        // $mediaItems = $post->getMedia();
        // $image = $mediaItems[0]->getUrl('thumb');
        // // dd($post->getFirstMediaUrl());
        // // dd(base_path(), public_path(), $post->getFirstMediaUrl());
        // dd($image);


        foreach ($posts as $key => $value) {
            $mediaItems = $value->getMedia();
            echo '<img src="' . $mediaItems[0]->getUrl('thumb') . '">';
            echo '<img src="' . $mediaItems[0]->getUrl() . '">';
        }


        /*        
        $data = Post::all();

        foreach ($data as $key => $value) {
            Post::find($value->id)
                ->addMedia(public_path($value->image))
                ->preservingOriginal()
                ->toMediaCollection();
        }
        */
        
        // $post->addMedia(public_path($post->image))->preservingOriginal()->toMediaCollection();
    }
}
