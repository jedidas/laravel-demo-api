<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Comment;
use App\Http\Requests\CommentRequest as StoreRequest;
use App\Http\Requests\CommentRequest as UpdateRequest;

class CommentController extends Controller
{
    private $model;

    public function __construct(Comment $category)
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $response = $this->model->show($id);
            return ['data' => $response];
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return array
     */
    public function update(UpdateRequest $request, Comment $comment)
    {
        $response = $comment->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return array
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $response = $comment->delete();
        return ['data' => $response];
    }
}
