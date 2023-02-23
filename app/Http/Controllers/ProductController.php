<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Policies\ProductPolicy;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(12);

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();

        if($request->url_image)
        {
            $product['url_image'] = $request->url_image->store('products');
        }

        $product['slug'] = Str::slug($request->name);

        $product = Product::create($product);

        return redirect()->route('admin.products')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // can permite determinadas ações
        // if (auth()->user()) {
        //     if (auth()->user()->can('seeProduct', $product)) {
        //         return view('products.show', ['product' => $product]);
        //     }

        //     // cannot negar determinadas ações
        //     if (auth()->user()->cannot('seeProduct', $product)) {
        //         return redirect()->route('products.index');
        //     }
        // }
        // else
        // {
        //     return redirect()->route('login.form');
        // }
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produto excluído com sucesso!');
    }
    public function index2()
    {
        $products = Product::with('category')->oldest();
        $categories = Category::all();

        return view('admin.products.index2', ['products' => $products->paginate(10), 'categories' => $categories]);
    }
}
