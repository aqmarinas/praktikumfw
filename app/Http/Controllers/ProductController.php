<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        'supplier_id' => 'required|exists:suppliers,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $products = Product::all();
        // $products = Product::paginate(2);

        // Mulai query builder
        $query = Product::with(['supplier', 'image']);

        // Cek apakah ada parameter 'search' di request
        if ($request->has('search') && $request->search != '') {

            $search = $request->search;

            // Melakukan pencarian berdasarkan nama produk atau informasi
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%');
            });
        }

        // Ambil produk dengan paginasi
        $products = $query->paginate(10);

        // return $products;
        return view("master-data.product-master.index-product", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view("master-data.product-master.create-product", compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data input
        $validatedData = $request->validate($this->rules);

        // create new product
        $product = Product::create($validatedData);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);

            $product->image()->create([
                'filename' => $filename,
            ]);
        }

        return redirect()->back()->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ada 2 cara menampilkan detail product
        // pakai find atau findOrFail
        // $product = Product::findOrFail($id);        
        // return view("master-data.product-master.detail-product", compact('product'));

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product-index')->with('error', 'Product not found');
        }
        return view("master-data.product-master.detail-product", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();

        return view('master-data.product-master.edit-product', compact('product', 'suppliers'));
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
        $product = Product::find($id);
        
        if ($product){
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully!');
        }
        
        return redirect()->back()->with('error', 'Product not found!');
    }

    public function export (){
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
}
