@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page" style="font-weight: bold;">Edit</li>
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
                    <form action="{{route($modelName.'.update', base64_encode($modelDetail->id)) }}" method="Post"
                        id="mw-form">
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
                                        <option value="{{ $value->id }}"
                                            {{ $modelDetail->parent_id == $value->id ? 'selected' : '' }}>
                                            {{ $value->title ?? ''}}</option>
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
                                        value="{{ old('title', $modelDetail->title) }}" placeholder="Enter Title" />
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
                                        value="{{ old('path', $modelDetail->path) }}" placeholder="Enter Path" />
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
                                        value="{{ old('module_order', $modelDetail->module_order) }}"
                                        placeholder="Enter Module Order" />
                                    @error('module_order')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <textarea name="icon" class="form-control @error('icon') is-invalid @enderror"
                                        id="editor" rows="3">{{ old('icon', $modelDetail->icon) }}</textarea>
                                    @error('icon')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if(isset($modelss) && (( $modelss->path !="javascript:void(0);") && ( $modelss->path !="")))
                        <div class="container p-5">
                            <?php $adModActions = $modelss->admin_module_actions; ?>
                            <div class="action">
                                <div class="action_name flex-start">
                                    <h4>Module Action Name</h4>
                                </div>
                                <div class="add_more_button flex-end">
                                    <button type="button" id="addMoreButton" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add Action
                                    </button>
                                </div>
                            </div>
                            @if($adModActions->isNotEmpty())
                            @foreach($adModActions as $adModAction)
                            <div class="row mt-5 acl_module_action">
                                <div class="col-3">
                                    <input type="text" name="data[0][name]" class="form-control" value="{{ $adModAction->name ?? '' }}"
                                        placeholder="Action Name">
                                </div>
                                <div class="col-5">
                                    <input type="text" name="data[0][function_name]" class="form-control" value="{{ $adModAction->function_name ?? '' }}"
                                        placeholder="Function Name">
                                </div>
                                <div class="col-2">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-sm btn-danger removeButton">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            @endif
                            <span id="appendHtml"></span>
                        </div>
                        @endif

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        let actionIndex = 1;
        $("#addMoreButton").on("click", function() {
            let newAction = `
                    <div class="row mt-3 acl_module_action">
                        <div class="col-3">
                            <input type="text" name="data[${actionIndex}][name]" class="form-control" placeholder="Action Name">
                        </div>
                        <div class="col-5">
                            <input type="text" name="data[${actionIndex}][function_name]" class="form-control" placeholder="Function Name">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-danger removeButton">
                                <i class="fas fa-trash-alt"></i> X
                            </button>
                        </div>
                    </div>
                `;
            $("#appendHtml").append(newAction);

            actionIndex++;
        });

        $(document).on("click", ".removeButton", function() {
            $(this).closest(".row").remove();
        });
    });
    </script>
    @endsection