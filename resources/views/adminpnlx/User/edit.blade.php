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
                    <form action="{{route($modelName.'.update', base64_encode($modelDetail->id)) }}" method="Post" id="mw-form">
                        @csrf()
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror"  value="{{ old('firstname', $modelDetail->first_name) }}"
                                        placeholder="Enter First Name" />
                                    @error('firstname')
                                        <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $modelDetail->last_name) }}"
                                        placeholder="Enter Last Name" />
                                    @error('lastname')
                                        <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $modelDetail->email) }}" placeholder="Enter Email" />
                                    @error('email')
                                        <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                       <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $modelDetail->phone_number) }}"
                                        placeholder="Enter Phone Number" minLenth="8" maxLength="10"/>
                                        @error('phone_number')
                                        <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date OF Birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $modelDetail->date_of_birth) }}"
                                        placeholder="Enter Date OF Birth"/>
                                        @error('date_of_birth')
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
                                                id="flexRadioDefault1" value="Male" {{ $modelDetail->gender == "Male" ? 'checked' : ''}} />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" value="Female" {{ $modelDetail->gender == "Female" ? 'checked' : ''}}/>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" value="Other" {{ $modelDetail->gender == "Other" ? 'checked' : ''}} />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name="image" />
                                    <figure class="imagecheck" style="width:100px; margin-top:5px;">
                                        <img class="w-100" src="{{asset('assets/img/examples/product1.jpg')}}" alt="title"
                                            class="imagecheck-image" />
                                    </figure>
                                    <small id="errorInput" class="form-text text-muted"> </small>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        C2C
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        C2B
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="editor" rows="5">{{ old('description', $modelDetail->description)}}</textarea>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="javascript:void(0);" onclick="document.getElementById('mw-form').reset();" class="btn btn-danger">Cancel</a>
                            </div>
                    </form>
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