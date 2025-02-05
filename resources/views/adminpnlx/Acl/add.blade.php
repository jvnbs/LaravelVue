@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page" style="font-weight: bold;">Add</li>
                    <li class="breadcrumb-item"><a href="{{route('Dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route($modelName.'.index') }}">{{ $sectionName }}</a></li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                </div>
                <div class="card-body">
                    <form action="{{route($modelName.'.store') }}" method="Post" id="mw-form">
                        @csrf()
                        <div class="row">

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="role_id">Parent ID</label>
                                    <select name="parent_id"
                                        class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">Select Parent ID</option>
                                        @if($parent_list)
                                        @foreach($parent_list as $value)
                                        <option value="{{ $value->id }}">{{ $value->title ?? ''}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('parent_id')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="title"> Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" placeholder="Enter Title" />
                                    @error('title')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="path"> Path</label>
                                    <input type="text" name="path"
                                        class="form-control @error('path') is-invalid @enderror"
                                        value="{{ old('path') }}" placeholder="Enter Path" />
                                    <span class="text-danger">javascript:void(0);</span>
                                    @error('path')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="module_order"> Module Order</label>
                                    <input type="number" name="module_order"
                                        class="form-control @error('module_order') is-invalid @enderror"
                                        value="{{ old('module_order') }}" placeholder="Enter Module Order" />
                                    @error('module_order')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <textarea name="icon" class="form-control @error('icon') is-invalid @enderror"
                                        id="editor" rows="5"></textarea>
                                    @error('icon')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" id="submitButton" class="btn btn-success">Submit</button>
                                <a href="javascript:void(0);" onclick="document.getElementById('mw-form').reset();"
                                    class="btn btn-danger">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection