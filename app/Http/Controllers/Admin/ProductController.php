<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\entrepreneur;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all(); // Asegúrate de importar correctamente el modelo
        $entrepreneurs = entrepreneur::all(); // Asegúrate de importar correctamente el modelo
        return view('admin.products.create', compact('categories', 'entrepreneurs'));
        // return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    //  Schema::create('products', function (Blueprint $table) {
    //     $table->id('id_pdt'); // Clave primaria
    //     $table->string('pdt_name'); // Nombre del producto
    //     $table->text('pdt_description')->nullable(); // Descripción del producto (opcional)
    //     $table->enum('pdt_status', [1, 2])->default(1); 
    //     $table->string('pdt_img')->nullable(); // Imagen del producto (ruta de la imagen, opcional)
    //     $table->decimal('pdt_price', 8, 2); // Precio del producto
    //     $table->unsignedBigInteger('pdt_id_ctg'); // Clave foránea de la categoría
    //     $table->unsignedBigInteger('pdt_id_etp'); // Clave foránea del emprendedor
    //     $table->timestamps();




    public function store(Request $request)
    {
        $request->validate([
            'pdt_name'        => 'required',
            'pdt_description' => 'required',
            'pdt_price' => 'required',
        ]);
    
        $product = product::create($request->all());
    
    
            return redirect()->route('admin.products.index', $product)
            ->with('info', 'el producto se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product, category $categories,entrepreneur $entrepreneurs)
    { 
         $categories = category::all(); 
         $entrepreneurs = entrepreneur::all(); 
        return view('admin.products.show', compact('product','categories', 'entrepreneurs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product,category $categories,entrepreneur $entrepreneurs)
    { 
         $categories = category::all(); 
         $entrepreneurs = entrepreneur::all(); 
       
        return view('admin.products.edit', compact('product', 'categories', 'entrepreneurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'pdt_name'        => 'required',
            'pdt_description' => 'required',
            'pdt_price' => 'required',
        ]);
        $product->update($request->all());
        return redirect()->route('admin.products.index',$product)
        ->with('info', 'el producto se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()
        ->route('admin.products.index')
        ->with('info', 'El producto: '.$product->pdt_name.'ha sido eliminado');
    }
}
