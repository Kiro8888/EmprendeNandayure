<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.categories.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
           $request->validate([
        'ctg_name'        => 'required',
        'ctg_description' => 'required'

    ]);

    $category = category::create($request->all());


        return redirect()->route('admin.categories.index', $category)
        ->with('info', 'la categoria se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view('admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'ctg_name'        => 'required',
            'ctg_description' => 'required'
    
        ]);

        // return $request->all();
        $category->update($request->all());
        return redirect()->route('admin.categories.index',$category)
        ->with('info', 'la categoria se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()
        ->route('admin.categories.index')
        ->with('info', 'La categoria: '.$category->ctg_name.'ha sido eliminada');
    }
}