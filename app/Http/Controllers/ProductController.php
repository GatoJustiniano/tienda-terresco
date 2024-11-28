<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();
        $categories = Category::orderBy('name')->get();

        return view('product.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return Redirect::route('products.index')
            ->with('success', __('Product created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product_id): RedirectResponse
    {

        $product = Product::findOrFail($product_id);
        $product->update($request->validated());

        return Redirect::route('products.index')
            ->with('success', __('Product updated successfully.'));
    }

}
