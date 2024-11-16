<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $rules = [
        'supplier_name' => 'required|string|max:255',
        'supplier_address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'comment' => 'required|string|max:255',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mulai query builder
        $query = Supplier::query();

        // Cek apakah ada parameter 'search' di request
        if ($request->has('search') && $request->search != '') {

            // Melakukan pencarian berdasarkan nama produk atau informasi
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('supplier_name', 'like', '%' . $search . '%');
            });
        }

        // Ambil produk dengan paginasi
        $suppliers = $query->paginate(2);

        return view("master-data.supplier-master.index-supplier", compact('suppliers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.supplier-master.create-supplier");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);
        Supplier::create($validatedData);

        return redirect()->back()->with('success', 'Supplier created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        
        if (!$supplier) {
            return redirect()->route('supplier-index')->with('error', 'Supplier not found');
        }
        
        return view("master-data.supplier-master.detail-supplier", compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('master-data.supplier-master.edit-supplier', compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->back()->with('success', 'Supplier update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        
        if ($supplier){
            $supplier->delete();
            return redirect()->back()->with('success', 'Supplier deleted successfully!');
        }
        
        return redirect()->back()->with('error', 'Supplier not found!');

    }
}
