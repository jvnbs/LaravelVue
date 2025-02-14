<?php

namespace App\Http\Controllers\frontend;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepositoryInterface;
    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }


    public function index()
    {
        $data = $this->productRepositoryInterface->index();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No products found', 404);
        }

        return ApiResponseClass::sendResponse(
            ProductResource::collection($data),
            'Products retrieved successfully',
            200,
        );
    }


    public function create()
    {
        //
    }


    public function store(StoreProductRequest $request)
    {
        $details = [
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try {
            $product = $this->productRepositoryInterface->store($details);

            DB::commit();
            return ApiResponseClass::sendResponse(new ProductResource($product), 'Product Create Successful', 201);

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }


    public function show($id)
    {
        $data = $this->productRepositoryInterface->getById($id);
    
        return ApiResponseClass::sendResponse(
            new ProductResource($data),
            'Product fetch successfully',
            200
        );
    }
    

    public function edit(Product $product)
    {
        //
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $updateDetails = [
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try {
            $product = $this->productRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return ResponseClass::sendResponse('Product Update Successful', '', 201);

        } catch (\Exception $ex) {
            return ResponseClass::rollback($ex);
        }
    }


    public function destroy($id)
    {
        $this->productRepositoryInterface->delete($id);

        return ResponseClass::sendResponse('Product Delete Successful', '', 204);
    }
}
