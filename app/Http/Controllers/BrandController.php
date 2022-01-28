<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Brand;
use App\Http\Requests\BrandRequest as StoreRequest;
use App\Http\Requests\BrandRequest as UpdateRequest;

class BrandController extends Controller
{

    private $model;

    public function __construct(Brand $category)
    {
        $this->model = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->model->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateRequest $request
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
     * @param int $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $brand)
    {
        try {
            $response = $this->model->show($brand);
            return ['data' => $response];
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Brand $brand
     * @return array
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        $response = $brand->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return array
     * @throws \Exception
     */
    public function destroy(Brand $brand)
    {
        $response = $brand->delete();
        return ['data' => $response];
    }


}
