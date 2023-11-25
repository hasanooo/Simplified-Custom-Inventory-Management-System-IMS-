<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function product_index()
    {
        $allproduct = Product::all();
        return view('product.productindex', compact('allproduct'));
    }
    public function product_form()
    {
        return view('product.productform');
    }
    public function product_store(ProductRequest $request)
    {

        Product::create($request->validated());
        Session::flash('message', 'Product Created Successfully');
        return redirect()->route('product.index');
    }
    public function product_form_edit(Request $req)
    {
        $product = Product::where('id', $req->id)->first();
        return view('product.productformedit', compact('product'));
    }
    public function product_form_edit_submit(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->validated());
            Session::flash('message', 'Product Updated Successfully');
        }

        return redirect()->route('product.index');
    }
    public function product_view($id)
    {
        $product = Product::find($id);
        return view('product.productview', compact('product'));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            Session::flash('message', 'Product Deleted Successfully');
        }
        return redirect()->route('product.index');
    }
}