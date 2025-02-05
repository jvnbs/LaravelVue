@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page" style="font-weight: bold;">View</li>
                    <li class="breadcrumb-item"><a href="{{route('Dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route($modelName.'.index') }}">{{ $sectionName }}</a></li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-body p-0">
                    <!-- User details layout -->
                    <div class="p-5">
                        @if($modelDetail)
                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">First Name</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->first_name ?? '' }}
                                {{ $modelDetail->last_name ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Last Name</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->last_name ?? '' }}
                                {{ $modelDetail->last_name ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Email</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->email ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Phone Number</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->phone_number ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Gender</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->gender ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Description</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->description ?? '' }}</div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Date Of Birth</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->date_of_birth ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Added On</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">{{ $modelDetail->created_at ?? '' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 font-weight-bold">Status</div>
                            <div class="col-md-1 font-weight-bold">:</div>
                            <div class="col-md-9">
                                @if($modelDetail->is_active == 1)
                                <span class="badge badge-success">Activated</span>
                                @else
                                <span class="badge badge-danger">Deactivated</span>
                                @endif
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection