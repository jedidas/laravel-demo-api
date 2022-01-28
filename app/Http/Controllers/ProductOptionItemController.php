<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductOptionItemRequest;
use App\Http\Requests\UpdateProductOptionItemRequest;
use App\Models\ProductOptionItem;

class ProductOptionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \App\Http\Requests\StoreProductOptionItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductOptionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductOptionItem $productOptionItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOptionItem $productOptionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductOptionItem $productOptionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOptionItem $productOptionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductOptionItemRequest $request
     * @param \App\Models\ProductOptionItem $productOptionItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductOptionItemRequest $request, ProductOptionItem $productOptionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductOptionItem $productOptionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOptionItem $productOptionItem)
    {
        //
    }
}
