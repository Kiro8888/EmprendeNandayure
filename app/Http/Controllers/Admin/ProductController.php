<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\entrepreneur;

class ProductController extends Controller
{



    public function __construct(){
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.destroy')->only('destroy');
        $this->middleware('can:admin.products.show')->only('show');
    }




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

    public function store(Request $request)
    {
        $request->validate([
            'pdt_name'        => 'required',
            'pdt_description' => 'required',
            'pdt_price' => 'required',
        ]);

        $productData = $request->all();

        if ($request->hasFile('pdt_img')) {
            $imageName = time().'.'.$request->pdt_img->extension();  
            $request->pdt_img->move(public_path('images/products'), $imageName);
            $productData['pdt_img'] = 'images/products/' . $imageName;
        }
    
        $product = product::create($productData);
    
    
            return redirect()->route('admin.products.index')
            ->with('info', 'el producto se creo correctamente');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'pdt_name'        => 'required',
    //         'pdt_description' => 'required',
    //         'pdt_price' => 'required',
    //     ]);
    
    //     $product = product::create($request->all());
    
    
    //         return redirect()->route('admin.products.index', $product)
    //         ->with('info', 'el producto se creo correctamente');
    // }

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
         $productData = $request->all();
     
         // Si se sube una nueva imagen, guárdala y actualiza la ruta
         if ($request->hasFile('pdt_img')) {
             // Eliminar la imagen anterior si existe
             if ($product->pdt_img && file_exists(public_path($product->pdt_img))) {
                 unlink(public_path($product->pdt_img));
             }
     
             $imageName = time().'.'.$request->pdt_img->extension();  
             $request->pdt_img->move(public_path('images/products'), $imageName);
             $productData['pdt_img'] = 'images/products/' . $imageName;
         }
     
         $product->update($productData);
     
         return redirect()->route('admin.products.index', $product)
             ->with('info', 'El servicio se actualizó correctamente');
     }
    // public function update(Request $request, product $product)
    // {
    //     $request->validate([
    //         'pdt_name'        => 'required',
    //         'pdt_description' => 'required',
    //         'pdt_price' => 'required',
    //     ]);
    //     $product->update($request->all());
    //     return redirect()->route('admin.products.index',$product)
    //     ->with('info', 'el producto se actualizo correctamente');
    // }



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
