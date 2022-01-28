<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Requests\FavoriteRequest as StoreRequest;
use App\Http\Requests\FavoriteRequest as UpdateRequest;

class FavoriteController extends Controller
{

    private $model;

    public function __construct(Favorite $favorite)
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
     * @param  \App\Http\Requests\FavoriteRequest  $request
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
     * @param Favorite $favorite
     * @return array
     */
    public function show(Favorite $favorite)
    {
        return ['data' => $favorite];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FavoriteRequest  $request
     * @param Favorite $favorite
     * @return array
     */
    public function update(UpdateRequest $request, Favorite $favorite)
    {
        $response = $favorite->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Favorite $favorite
     * @return array
     */
    public function destroy(Favorite $favorite)
    {
        $response = $favorite->delete();
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Favorite $favorite
     * @return array
     */
    public function getByUserId(int $id)
    {
        return $this->model->getByUserId($id);
    }
}
