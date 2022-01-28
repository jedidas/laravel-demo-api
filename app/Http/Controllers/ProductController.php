<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
//
use App\Models\Product;
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;


class ProductController extends Controller
{

    /**
     * @var Product
     */
    private $model;
    /**
     * @var array
     */
    private $settings;

    function __construct(Product $model)
    {
        $this->settings = [
            "options" => true,
            "tags" => true,
            "votes" => true,
            "brand" => true,
            "comments" => true,
            "all" => true,
        ];
        $this->model = $model;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateRequest $request
     * @return array
     */
    private function checkOptions(Request $request)
    {
        $appends = [];
        foreach ($this->settings as $key => $value) {
            if (array_key_exists('all', $request->all())) {
                $appends = array_keys($this->settings);
                array_pop($appends);
            } elseif (array_key_exists($key, $request->all())) {
                if ($request->get($key) === true || $request->get($key) === "true") {
                    array_push($appends, $key);
                }
            }
        }
        return $appends;
    }

    private function addOptions($request, $response)
    {
        $appends = $this->checkOptions($request);
        foreach ($response->items() as $item) {
            $item->setAppends($appends);
        }
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @param UpdateRequest $request
     * @return Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return $this->addOptions($request, $this->model->getAll());
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
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $resp = $this->model->create($request->all());
        if ($resp) {
            return response()->json(["message" => "Product created correctly", "data" => $resp]);
        }
        return response()->json(["message" => "Failed to create product", "data" => null], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param UpdateRequest $request
     * @param int $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $product)
    {

        try {
            $appends = $this->checkOptions($request);
            $response = $this->model->show($product)->setAppends($appends);
            return ['data' => $response];
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Product $product
     * @return array
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $response = $product->update($request->all());
        return ['data' => $response];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return array
     */
    public function destroy(Product $product)
    {
        $response = $product->delete();
        return ['data' => $response];
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return array
     */
    public function getTags(Product $product)
    {
        return ['data' => $product->tags];
    }

    public function getByBrandId(StoreRequest $request, int $brand)
    {
        try {
            $appends = $this->checkOptions($request);
            return $this->model->getByBrandId($brand)->paginate(env('PAGINATION_COUNT'))->each(function ($item) use ($appends) {
                $item->setAppends($appends);
            });
        } catch (Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 404);
        }

    }

}
