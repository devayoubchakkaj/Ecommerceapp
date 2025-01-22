<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(2);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $isUpdate = false;
        $product = new Product();
        $product->fill(
            [
                'quantity'=>0,
                'price'=>0,
            ]
        );
        return view('product.form',compact( 'product','isUpdate'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFeild = $request->validated();
        if($request->hasFile('image')){
             $formFeild['image'] = $request->file('image')->store('product','public');
        }
        Product::create($formFeild);
        return to_route('products.index')->with('success','Product create successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $isUpdate = true;
        return view('product.form',compact('product', 'isUpdate'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        $product->fill($request->validated())->save();
        return to_route('products.index')->with('success','Product Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success','Product Delted successfully');

    }
}
