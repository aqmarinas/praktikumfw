<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    // use $this to access this property from class
    private $rules = [
        'product_name' => 'required|string|max:255',
        'unit' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'information' => 'nullable|string',
        'qty' => 'required|integer|min:1',
        'producer' => 'required|string|max:255',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("master-data.product-master.index-product", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.product-master.create-product");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data input
        $validatedData = $request->validate($this->rules);

        // create new product
        Product::create($validatedData);

        return redirect()->back()->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate data input
        $request->validate($this->rules);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        // $product->update([
        //     'product_name' => $request->product_name,
        //     'unit' => $request->unit,
        //     'type' => $request->type,
        //     'information' => $request->information,
        //     'qty' => $request->qty,
        //     'producer' => $request->producer,
        // ]);
        return redirect()->back()->with('success', 'Product update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
