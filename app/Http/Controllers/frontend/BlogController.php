<?php

namespace App\Http\Controllers\frontend;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Interfaces\BlogRepositoryInterface;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogRepositoryInterface $BlogRepositoryInterface;
    public function __construct(BlogRepositoryInterface $BlogRepositoryInterface)
    {
        $this->BlogRepositoryInterface = $BlogRepositoryInterface;
    }


    public function index()
    {
        $data = $this->BlogRepositoryInterface->index();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            BlogResource::collection($data),
            'Blog retrieved successfully',
            200,
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $details = [
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try {
            $blog = $this->BlogRepositoryInterface->store($details);

            DB::commit();
            return ApiResponseClass::sendResponse(new BlogResource($blog), 'Blog Create Successful', 201);

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }


    public function show($id)
    {
        $data = $this->BlogRepositoryInterface->getById($id);
    
        return ApiResponseClass::sendResponse(
            new BlogResource($data),
            'blog fetch successfully',
            200
        );
    }
    

    public function edit(Request $product)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $updateDetails = [
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try {
            $blog = $this->BlogRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return ApiResponseClass::sendResponse('Blog Update Successful', '', 201);

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }


    public function destroy($id)
    {
        $this->BlogRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Blog Delete Successful', '', 204);
    }
}
