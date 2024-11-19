<?php

namespace App\Exports;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsPdfExport implements FromView
{
    public function view(): \Illuminate\Contracts\View\View
    {
        $products = Product::all();

        return view('exports.product-pdf', ['products' => $products]);
    }
}

