@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"></div>
                </div>
                <div class="card-body">
                    <form action="{{route('Admin.login') }}" method="Post" id="mw-form">
                        @csrf()
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror"
                                        value="{{ old('firstname') }}" placeholder="Enter First Name" />
                                    @error('firstname')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ old('lastname') }}" placeholder="Enter Last Name" />
                                    @error('lastname')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Enter Email" />
                                    @error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" placeholder="Enter Phone Number" minLenth="8"
                                        maxLength="10" />
                                    @error('phone_number')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password"
                                        value="{{ old('password') }}" placeholder="Enter Password" minLenth="8"
                                        maxLength="12" />
                                    @error('password')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Gender</label><br />
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <small id="errorInput" class="form-text text-muted"> </small>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name="image" />
                                    <figure class="imagecheck" style="width:100px; margin-top:5px;">
                                        <img class="w-100" src="../assets/img/examples/product1.jpg" alt="title"
                                            class="imagecheck-image" />
                                    </figure>
                                    <small id="errorInput" class="form-text text-muted"> </small>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        C1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        C2
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Your skills</label> <br>
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="HTML" class="selectgroup-input"
                                                checked="" />
                                            <span class="selectgroup-button">HTML</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="CSS" class="selectgroup-input" />
                                            <span class="selectgroup-button">CSS</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="PHP" class="selectgroup-input" />
                                            <span class="selectgroup-button">PHP</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="value" value="JavaScript"
                                                class="selectgroup-input" />
                                            <span class="selectgroup-button">JavaScript</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="comment">Description</label>
                                    <textarea name="description" class="form-control" id="editor" rows="5">
                          </textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
</script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
@endsection