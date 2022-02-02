<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Throwable;
use App\Http\Requests\ProductVoteRequest as StoreRequest;
use App\Http\Requests\ProductVoteRequest as UpdateRequest;
use App\Models\ProductVote;

class ProductVoteController extends Controller
{
    private $model;

    function __construct(ProductVote $model)
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
     * @param \App\Http\Requests\ProductVoteRequest $request
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $response = $this->model->show($id);
            return response()->json(['data' => $response]);
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductVote $productVotes
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVote $productVotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductVoteRequest $request
     * @param \App\Models\ProductVote $productVotes
     * @return array
     */
    public function update(UpdateRequest $request, ProductVote $productVotes)
    {
        $response = $productVotes->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductVote $productVotes
     * @return array
     */
    public function destroy(ProductVote $productVote)
    {
        $response = $productVote->delete();
        return ['data' => $response];
    }

    public function getByProductId(int $id)
    {
        return $this->model->getByProductId($id);
    }

    public function getUserLoggedInVotes(Request $request, int $id)
    {
        $bearerToken = explode('|', $request->bearerToken(), 2)[0];
        $user = User::where('email', $request->email)->first();
        if ($user->tokens()->where('id', $bearerToken)->count() >= 1) {
            return ['data' => $this->model->getUserLoggedInVotes($user->id, $id)];
        }
        return response()->json(["message" => "Unauthorised", "data" => null], 401);
    }

}
