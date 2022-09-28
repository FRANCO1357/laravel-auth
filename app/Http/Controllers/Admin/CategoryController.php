<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
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
            'label' => 'required|string|min:3|max:50|unique:categories',
            'color' => 'string',
        ],
        [
            'label.required' => 'La categoria è obbligatoria',
            'label.min' => 'La categoria deve avere minimo :min caratteri',
            'label.max' => 'La categoria deve avere massimo :max caratteri',
            'label.unique' => "La categoria $request->label esiste già",
        ]);

        $data = $request->all();

        $category = new Category();

        $category->fill($data);
        
        $category->save();

        return redirect()->route('admin.categories.show', $category)->with('message', 'Categoria creata con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'label' => ['required', 'string', 'min:3', 'max:50', Rule::unique('categories')->ignore($category->id )],
            'color' => 'string',
        ],
        [
            'label.required' => 'La categoria è obbligatoria',
            'label.min' => 'La categoria deve avere minimo :min caratteri',
            'label.max' => 'La categoria deve avere massimo :max caratteri',
            'label.unique' => "La categoria $request->label esiste già",
        ]);

        $data = $request->all();

        $category->update($data);

        return redirect()->route('admin.categories.show', $category)->with('message', 'Categoria modificata con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('message', 'La categoria è stata eliminata con successo')->with('type', 'danger');
    }
}
