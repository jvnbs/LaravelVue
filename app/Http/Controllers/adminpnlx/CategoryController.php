<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $modelName = "Role";
    protected $sectionName = "Role";
    protected $sectionNamePlural = "Roles";

    public function __construct(Request $request)
    {
        View::share('modelName', $this->modelName);
        View::share('sectionName', $this->sectionName);
        View::share('sectionNamePlural', $this->sectionNamePlural);
    }

    public function index(Request $request)
    {
        $query = Role::query();
    
        $searchArray = $request->all();
    
        $gender = $request->gender;
        $status = $request->status;
        $searchTerm = $request->searchTerm;
    
        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }
    
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
    
        if ($request->has('searchTerm')) {
            $searchTerm = $request->searchTerm;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('email', 'LIKE', "%$searchTerm%")
                    ->orWhere('phone', 'LIKE', "%$searchTerm%");
            });
        }
    
        $query->where('is_deleted', 0);
        $results = $query->paginate(5);
        return view('adminpnlx.'.$this->modelName.'.index', compact('results', 'searchTerm', 'gender', 'status'));
    }
    
    
    


    
    public function create()
    {
        return view('adminpnlx.'.$this->modelName.'.add');
    }

   

    
    public function store(Request $request)
    {
        $formData = $request->all();
    
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'The name is required.',
                'name.string' => 'The name must be a string.',
                'name.max' => 'The name cannot exceed 255 characters.',
                'description.required' => 'The description is required.',
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
            $user = new Role();
            $user->name = $request->name;
            $user->description = $request->description;
            $user->save();
    
            DB::commit(); 
            return redirect()->route($this->modelName . '.index')->with('success', $this->sectionName.' has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    
    
    public function show(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = Role::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        return view('adminpnlx.'.$this->modelName.'.view', compact('modelDetail'));
    }

    public function edit(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = Role::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        return view('adminpnlx.'.$this->modelName.'.edit', compact('modelDetail'));
    }


public function update(Request $request, $id)
{
    $modelId = base64_decode($id);
    $modelDetail = Role::find($modelId);
    if (!$modelDetail) {
        return redirect()->back()->with('error', 'Something went wrong try Again');
    }
    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
            'description' => 'required',
        ],
        [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name cannot exceed 255 characters.',
            'description.required' => 'The description is required.',
        ]
    );

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        DB::beginTransaction();
        $user                = $modelDetail;
        $user->name = $request->name;
        $user->description = $request->description;
        $user->save();
        DB::commit();
        return redirect()->route($this->modelName . '.index')->with('success', $this->sectionName.' has been updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error updating user: ' . $e->getMessage(), ['stack' => $e->getTrace()]);
        return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
    }
}

public function delete($id)
{
    DB::beginTransaction();

    try {
        $modelId = base64_decode($id);
        $modelDetail = Role::find($modelId);
        if (!$modelDetail) {
            DB::rollBack();
            return redirect()->back()->with('error', $this->sectionName.'  not found. Try again.');
        }

        $modelDetail->delete();
        DB::commit();
        return redirect()->route($this->modelName.'.index')->with('success', $this->sectionName.'  deleted successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Something went wrong. Try again.');
    }
}


public function changeStatus($id, $status)
{
    $modelId = base64_decode($id);
    $modelDetail = Role::find($modelId);
    if (!$modelDetail) {
        return redirect()->back()->with('error', $this->sectionName.'  not found. Try again.');
    }

    $modelDetail->is_active = $status == 1 ? 0 : 1;
    $modelDetail->save();

    return redirect()->route($this->modelName.'.index')->with('success', $this->sectionName.'  status has been updated successfully.');
}


}