<?php

namespace App\Http\Controllers;

use App\Models\ProductOption;
use App\Http\Requests\ProductOptionRequest as StoreRequest;
use App\Http\Requests\ProductOptionRequest as UpdateRequest;

class ProductOptionController extends Controller
{
    private $model;

    public function __construct(ProductOption $favorite)
    {
        $this->model = $favorite;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->paginate(env('PAGINATION_COUNT'));
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
     * @param  \App\Http\Requests\ProductOptionRequest  $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        $response = $this->model->create($request);
        return ['data' => $response];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return array
     */
    public function show(ProductOption $productOption)
    {
        return ['data' => $productOption];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOption $productOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductOptionRequest  $request
     * @param  \App\Models\ProductOption  $productOption
     * @return array
     */
    public function update(UpdateRequest $request, ProductOption $productOption)
    {
        $response = $productOption->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductOption $productOption
     * @return array
     * @throws \Exception
     */
    public function destroy(ProductOption $productOption)
    {
        $response = $productOption->delete();
        return ['data' => $response];
    }

    public function getByProductId(int $id)
    {
        $response = $this->model->getByProductId($id);
        return ['data' => $response];
    }

}
