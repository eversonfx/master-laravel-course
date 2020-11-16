<?php

namespace App\Http\Controllers;

use \App\BlogPost;
use \App\Http\Requests\StorePost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //comments_count
    public function index()
    {
        return view('posts.index',
        ['posts' => BlogPost::withCount('comments')->get()]
    );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $request->session()->reflash();

            return view('posts.show', [
                'post' => BlogPost::with('comments')->findOrFail($id)
            ]);

    }

    public function create() {
        if (Auth::check()) {
            return view('posts.create');
        } else {
            return redirect('login');
        }
    }
    
    public function store(StorePost $request) {
        
        $validateData = $request->validated();

        // dd($validateData);

        $blogPost = BlogPost::create($validateData);

        $request->session()->flash('status', 'Blog post was created!');

        return redirect()->route('posts.show', ['post' => $blogPost->id]);
    }

    public function edit($id) {
        $post = BlogPost::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(StorePost $request, $id) {
        $post = BlogPost::findOrFail($id);  
        $validatedData = $request->validated();

        $post->fill($validatedData);
        $post->save();

        $request->session()->flash('status', 'Blog post was updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    public function destroy(Request $request, $id) {
        $post = BlogPost::findOrFail($id);
        
        $post->delete();

        // BlogPost::destroy($id);

        $request->session()->flash('status', 'Blog post was deleted!');

        return redirect()->route('posts.index');

    }
}
