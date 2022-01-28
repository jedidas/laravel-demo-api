<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Category;
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;

class CategoryController extends Controller
{

    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->getAll();
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
     * @param  \App\Http\Requests\StoreBrandRequest  $request
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
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function show(int $category)
    {
        try {
            $response = $this->model->show($category);
            return ['data' => $response];
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CategoryRequest $request
     * @param \App\Models\Category $category
     * @return array
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $response = $category->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return array
     */
    public function destroy(Category $category)
    {
        $response = $category->delete();
        return ['data' => $response];
    }
}
