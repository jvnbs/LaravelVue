@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item" aria-current="page" style="font-weight: bold;">Update Profile</li>
                    <li class="breadcrumb-item"><a href="{{route('Dashboard') }}">Dashboard</a></li>
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
                    <form action="{{ route('Admin.changePassword') }}" method="POST" id="mw-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-6 offset-2">
                                <div class="form-group">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" value=""
                                        placeholder="Enter password" />
                                    @error('password')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 offset-2">
                                <div class="form-group">
                                    <label for="password_confirmation"><strong>Confirm Password</strong></label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        value="" placeholder="Confirm password" />
                                    @error('password_confirmation')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 offset-2">
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="javascript:void(0);" onclick="document.getElementById('mw-form').reset();"
                                class="btn btn-danger">Cancel</a>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection