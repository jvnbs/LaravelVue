@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('Dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $sectionName }}</li>
                </ol>
            </nav>
        </div>
        <div class="ms-md-auto py-1 py-md-0">
            <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
            <a href="{{route($modelName.'.create') }}" class="btn btn-primary btn-round">Add {{ $sectionName }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-start">#</th>
                                    <th scope="col" class="text-start">Title</th>
                                    <th scope="col" class="text-start">Path</th>
                                    <th scope="col" class="text-start">Added On</th>
                                    <th scope="col" class="text-start">Status</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($results->isNotEmpty())
                                @foreach($results as $result)
                                <tr>
                                    <td class="text-start">{{ $result->parent_name ?? '' }}</td>
                                    <td class="text-start">{{ $result->title ?? '' }}</td>
                                    <td class="text-start">{{ $result->path ?? '' }}</td>
                                    <td class="text-start">{{ $result->created_at ?? '' }}</td>
                                    <td class="text-start">
                                        @if($result->is_active == 1)
                                        <span class="badge badge-success">Activated</span>
                                        @else
                                        <span class="badge badge-danger">Deactivated</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                    @if($result->is_active == 0)
                                    <a href="{{ route($modelName . '.changeStatus', [base64_encode($result->id), 0]) }}" class="btn btn-icon btn-round btn-success btn-sm" title="Activated">
                                        <i class="fa fa-check btn-sm"></i>
                                        </a>
                                        @else
                                        <a href="{{ route($modelName . '.changeStatus', [base64_encode($result->id), 1]) }}" class="btn btn-icon btn-round btn-danger btn-sm" title="Deactivated">
                                        <i class="fa fa-check btn-sm"></i>
                                        @endif
                                        <a href="{{ route($modelName . '.edit', base64_encode($result->id)) }}" class="btn btn-icon btn-round btn-warning btn-sm mx-2" title="Edit">
                                            <i class="fa fa-info btn-sm"></i>
                                        </a>
                                        <a href="{{ route($modelName . '.delete', base64_encode($result->id)) }}" class="btn btn-icon btn-round btn-danger btn-sm" title="Remove">
                                            <i class="fa fa-trash btn-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center text-danger"> Record Not Found. </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 text-end flex-end">
                                <div class="pagination">
                                    {{ $results->links('adminpnlx.pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection