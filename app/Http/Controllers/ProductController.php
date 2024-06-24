<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date['products']= Product::orderBy('id','asc')->paginate(5);
        return view('product.list', $date);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
        'name' => 'required',
        'description' => 'required',
        'img' => 'required'
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->img = $request->img;

    $product->save();

    return redirect('products')->with('success', 'Great! Product created successfully.');

}

    

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $date['product_info'] = Product::where($where)->first();
        return view('product.edit', $date);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'img' => 'required'
        ]);
    
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->img = $request->img;
    
    
        $product->save();
    
        return redirect('products')->with('success', 'Great! Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = Product::find($id);
    
        if (!is_null($product->image)) {
            $imagePath = public_path('images/' . $product->image);
    
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
    
        $product->delete();
    
        $products = Product::all();
        $numarator = 0;
        foreach ($products as $produs) {
            $numarator++;
            $produs->Id = $numarator;
            $produs->save();
        }
    
        return redirect('products')->with('success', 'Product deleted successfully');
    }
    
}    