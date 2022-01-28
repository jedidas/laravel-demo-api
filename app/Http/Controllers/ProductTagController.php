<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use App\Http\Requests\ProductTagRequest as StoreRequest;
use App\Http\Requests\ProductTagRequest as UpdateRequest;

class ProductTagController extends Controller
{
    private $model;

    function __construct(ProductTag $model)
    {
        $this->model = $model;
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
     * @param \App\Http\Requests\ProductTagRequest $request
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
     * @param \App\Models\ProductTag $productTag
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTag $productTag)
    {
        return ['data' => $productTag];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductTag $productTag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTag $productTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductTagRequest $request
     * @param \App\Models\ProductTag $productTag
     * @return array
     */
    public function update(UpdateRequest $request, ProductTag $productTag)
    {
        $response = $productTag->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductTag $productTag
     * @return array
     */
    public function destroy(ProductTag $productTag)
    {
        $response = $productTag->delete();
        return ['data' => $response];
    }

    public function getByProductId(int $id)
    {
        return $this->model->getByProductId($id);
    }


}
