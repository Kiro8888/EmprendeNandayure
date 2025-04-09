<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\entrepreneurship;

class ProductController extends Controller
{



    public function __construct(){
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.destroy')->only('destroy');
        // $this->middleware('can:admin.products.show')->only('show');
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $categories = category::all();
    
        if ($user->hasRole('Entrepreneur')) {
            $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->get();
            $products = product::whereIn('pdt_id_etp', $entrepreneurships->pluck('id'))->paginate(10); // Use paginate
        } else {
            $products = product::paginate(10); // Use paginate
            $entrepreneurships = entrepreneurship::all();
        }
    
        return view('admin.products.index', compact('products', 'categories', 'entrepreneurships'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all(); // Asegúrate de importar correctamente el modelo
        $user = auth()->user();

    // Si el usuario tiene el rol de Entrepreneur, filtrar sus emprendimientos
    if ($user->hasRole('Entrepreneur')) {
        $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->get();
    } else {
        // Si es Admin u otro rol, mostrar todos los emprendimientos
        $entrepreneurships = entrepreneurship::all();
    }

        return view('admin.products.create', compact('categories', 'entrepreneurships'));

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'pdt_name' => ['required', 'string'],
            'pdt_description' => ['required'],
            'pdt_price' => ['required'],
            'pdt_id_ctg' => ['required'],
            'pdt_id_etp' => ['required'],
        ]);

        $productData = $request->all();

        if ($request->hasFile('pdt_img')) {
            $imageName = time().'.'.$request->pdt_img->extension();  
            $request->pdt_img->move(public_path('images/products'), $imageName);
            $productData['pdt_img'] = 'images/products/' . $imageName;
        } else {
            // Set default image if none is uploaded
            $productData['pdt_img'] = 'images/products/default.png';
        }
    
        $product = product::create($productData);
    
    
            return redirect()->route('admin.products.index')
            ->with('info', 'El producto se creó correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product, category $categories, entrepreneurship $entrepreneurships)
    { 
         $categories = category::all(); 
         $entrepreneurships = entrepreneurship::all(); 
        return view('admin.products.show', compact('product','categories','entrepreneurships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product,category $categories, entrepreneurship $entrepreneurships)
    { 
         $categories = category::all(); 
         $entrepreneurships = entrepreneurship::all(); 
        return view('admin.products.edit', compact('product', 'categories', 'entrepreneurships'));
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
         } else if (!$product->pdt_img) {
            // Set default image if none exists
            $productData['pdt_img'] = 'images/products/default.png';
        }
     
         $product->update($productData);
     
         return redirect()->route('admin.products.index', $product)
             ->with('info', 'El producto se actualizó correctamente');
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
