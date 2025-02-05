@extends('adminpnlx.layouts.default_login')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Login</div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.login') }}" method="Post" id="mw-form">
                        @csrf()
                        <div class="row">
                           
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Enter Email" maxLength="32" />
                                    @error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" placeholder="Enter Password" minLenth="8"
                                        maxLength="12" />
                                    @error('password')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="javascript:void(0);" onclick="document.getElementById('mw-form').reset();"
                                    class="btn btn-danger">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection