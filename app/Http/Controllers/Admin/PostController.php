<?php

namespace App\Http\Controllers\admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('admin.posts.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:50|unique:posts',
            'content' => 'required|string',
            'image' => 'nullable|url'
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => "Il titolo $request->title esiste già",
            'content.required' => 'Il contenuto è obbligatorio',
            'image.required' => 'Il link dell\'immagine deve iniziare con http',

        ]);

        $data = $request->all();

        $post = new Post();

        $post->fill($data);

        $post->slug = Str::slug($post->title, '-');
        
        $post->save();

        return redirect()->route('admin.posts.show', $post)->with('message', 'Post creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:50', Rule::unique('posts')->ignore($post->id )],
            'content' => 'required|string',
            'image' => 'nullable|url'
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => "Il titolo $request->title esiste già",
            'content.required' => 'Il contenuto è obbligatorio',
            'image.required' => 'Il link dell\'immagine deve iniziare con http',

        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->title, '-');

        $post->update($data);

        return redirect()->route('admin.posts.show', $post)->with('message', 'Post modificato con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Il post è stato eliminato con successo')->with('type', 'danger');
    }
}
