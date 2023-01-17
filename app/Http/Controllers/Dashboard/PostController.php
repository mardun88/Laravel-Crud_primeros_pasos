<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('dashboard.post.index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'tittle');
        $post = new Post();

        //dd($categories);

        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //dd($request->all());

        // $request->validate(StoreRequest::myRules());
        //$validated = Validator::make($request->all(), StoreRequest::myRules());
        // dd($validated->fails());
        //$data = array_merge($request->all(), ['image'=>""]);
        // $data = $request->validate();
        // dd($data);

        Post::create($request->validated());

        return to_route("post")->with("status", "Registro Creado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        echo 'show';

        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('id', 'tittle');

        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {   
        $data  =  $request->validated();
        if (isset($data['image'])) 
        {
            $data['image'] = $filename = time().".".$data['image']->extension();

            // dd($data);

            $request->image->move(public_path('image'), $filename);
        }
        
        $post->update($data);
        // $request->session()->flash("status", "Registro Actualizado.");
        return to_route("post.store")->with("status", "Registro Actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        echo 'eliminar';
        
        $post->delete();
        
        return to_route("post.store")->with("status", "Registro Eliminado.");

    }
}
