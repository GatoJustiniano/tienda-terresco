<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $brands = Brand::paginate();

        return view('brand.index', compact('brands'))
            ->with('i', ($request->input('page', 1) - 1) * $brands->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $brand = new Brand();

        return view('brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());

        return Redirect::route('brands.index')
            ->with('success', __('Brand created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $brand = Brand::findOrFail($id);

        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $brand = Brand::find($id);

        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, $product_id): RedirectResponse
    {

        $brand = Brand::findOrFail($product_id);
        $brand->update($request->validated());

        return Redirect::route('brands.index')
            ->with('success', __('Brand updated successfully.'));
    }

}
