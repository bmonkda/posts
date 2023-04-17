<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
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
    }

    public function getCategorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function getSubcategorias($categoria)
    {
        $subcategorias = Subcategoria::where('categoria_id', $categoria)->pluck('nombre', 'id');
        return response()->json($subcategorias);
    }

    public function storeOrUpdatePost(Request $request, $id = null)
    {
        $post = $id ? Post::find($id) : new Post;
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->categoria_id = $request->categoria_id;
        $post->save();
        return response()->json(['success' => true]);
    }

}
