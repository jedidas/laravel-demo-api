<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest as StoreRequest;
use App\Http\Requests\TagRequest as UpdateRequest;

class TagController extends Controller
{
    private $model;

    function __construct(Tag $model)
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
     * @param \App\Http\Requests\TagRequest $request
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
     * @param \App\Models\Tag $tag
     * @return array
     */
    public function show(Tag $tag)
    {
        return ['data' => $tag];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TagRequest $request
     * @param \App\Models\Tag $tag
     * @return array
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        $response = $tag->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @return array
     */
    public function destroy(Tag $tag)
    {
        $response = $tag->delete();
        return ['data' => $response];
    }
}
