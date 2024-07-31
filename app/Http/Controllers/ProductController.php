<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
        public function showAll(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('product.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<form method="POST" action="' . route('product.delete', $row->id) . '" style="display:inline;">
                                 ' . csrf_field() . '
                                 ' . method_field('DELETE') . '
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.showAll');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('product.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<form method="POST" action="' . route('product.delete', $row->id) . '" style="display:inline;">
                                 ' . csrf_field() . '
                                 ' . method_field('DELETE') . '
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.index');
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // Validate the request
        $data = $request->validate([
            'Product_Name' => 'required|string|max:255',
            'Product_Qty' => 'required|numeric',
            'Product_Price' => 'required|numeric',
            'Product_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Product_Description' => 'nullable|string',
        ]);

        if ($request->hasFile('Product_Image')) {
            $data['Product_Image'] = $request->file('Product_Image')->store('product_images', 'public');
        }

        Product::create($data);

        return redirect(route('product.index'))->with('success', 'Product created successfully!');
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'Product_Name' => 'required|string|max:255',
            'Product_Qty' => 'required|numeric',
            'Product_Price' => 'required|numeric',
            'Product_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Product_Description' => 'nullable|string',
        ]);

        if ($request->hasFile('Product_Image')) {
            $data['Product_Image'] = $request->file('Product_Image')->store('product_images', 'public');
        }

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function delete(Product $product) {
        $product->delete();
        return response()->json(['success' => 'Product deleted successfully']);
    }

    public function getProducts()
    {
        $products = Product::query(); // Your query here

        return DataTables::of($products)
            ->make(true); // Return DataTables response
    }
}
