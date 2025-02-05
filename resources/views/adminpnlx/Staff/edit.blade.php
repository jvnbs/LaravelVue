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
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror"
                                        value="{{ old('firstname', $modelDetail->first_name) }}"
                                        placeholder="Enter First Name" />
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
                                        value="{{ old('lastname', $modelDetail->last_name) }}"
                                        placeholder="Enter Last Name" />
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
                                        value="{{ old('email', $modelDetail->email) }}" placeholder="Enter Email" />
                                    @error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number"
                                        value="{{ old('phone_number', $modelDetail->phone_number) }}"
                                        placeholder="Enter Phone Number" minLenth="8" maxLength="10" />
                                    @error('phone_number')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date OF Birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth"
                                        value="{{ old('date_of_birth', $modelDetail->date_of_birth) }}"
                                        placeholder="Enter Date OF Birth" />
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
                                                id="flexRadioDefault1" value="Male"
                                                {{ $modelDetail->gender == "Male" ? 'checked' : ''}} />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" value="Female"
                                                {{ $modelDetail->gender == "Female" ? 'checked' : ''}} />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="flexRadioDefault2" value="Other"
                                                {{ $modelDetail->gender == "Other" ? 'checked' : ''}} />
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
                                        <img class="w-100" src="{{asset('img/examples/product1.jpg')}}"
                                            alt="title" class="imagecheck-image" />
                                    </figure>
                                    <small id="errorInput" class="form-text text-muted"> </small>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="editor"
                                        rows="5">{{ old('description', $modelDetail->description)}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row container p-5">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="role_id">Roles</label>
                                    <?php $roles = getAuthRoles(); ?>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="">Select Roles</option>
                                        @if($roles)
                                        @foreach($roles as $value)
                                        <option value="{{ $value->id }}" {{ $modelDetail->role_id == $value->id ? 'selected' : '' }} >{{ $value->name ?? ''}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('role_id')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row container p-5">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="role_id">Roles</label>
                                    <?php $roles = getAuthRoles(); ?>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="">Select Roles</option>
                                        @if($roles)
                                        @foreach($roles as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $modelDetail->role_id == $value->id ? 'selected' : '' }}>
                                            {{ $value->name ?? '' }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('role_id')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <h4 class="mb-3">User Permission</h4>
                                    <div class="mb-3">
                                        <button type="button" id="checkAll" class="btn btn-primary btn-sm me-2">Check
                                            All</button>
                                        <button type="button" id="uncheckAll" class="btn btn-secondary btn-sm">Uncheck
                                            All</button>
                                    </div>

                                    @foreach ($admin_modules as $admin_module)
                                        <?php $admin_sub_modules = $admin_module->admin_sub_modules; ?>
                                        <div class="card shadow-sm mb-3">
                                            <!-- Parent Module with  -->
                                            <div class="card-header bg-light d-flex align-items-center">
                                                <label class="form-check-label mb-0 d-flex align-items-center w-100">
                                                    <input type="checkbox" name="data[{{ $admin_module->id }}]"
                                                        value="{{ $admin_module->id }}" class="form-check-input module">
                                                    <strong class="text-dark">{{ $admin_module->title }}</strong>
                                                </label>
                                            </div>

                                            <div class="card-body">
                                                @if($admin_sub_modules->isEmpty())
                                                    <!-- No Submodules, Only Module Actions -->
                                                    @foreach ($admin_module->admin_module_actions as $action)
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" name="data[{{ $admin_module->id }}][module_actions][]"
                                                            value="{{ $action->id }}" class="form-check-input moduleAction">
                                                            <label class="form-check-label">{{ $action->name }}</label>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                @if($admin_sub_modules->isNotEmpty())
                                                    <!-- Parent Module with Submodules -->
                                                    @foreach ($admin_sub_modules as $sub_module)
                                                    <div class="sub-module mb-3 bg-light">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" name="data[{{ $admin_module->id }}][sub_modules][{{ $sub_module->id }}]"
                                                                value="{{ $sub_module->id }}" class="form-check-input subModule">
                                                            <label class="form-check-label"><strong>{{ $sub_module->title }}</strong></label>
                                                        </div>
                                                        <div class="d-flex flex-wrap gap-3 ms-4">
                                                            <!-- Actions for Submodule -->
                                                            <?php $admin_sub_module_actions = $sub_module->admin_module_actions; ?>
                                                            @foreach ($admin_sub_module_actions as $adm_sub_mod_action)
                                                            <div class="form-check d-flex align-items-center">
                                                                <input type="checkbox" name="data[{{ $admin_module->id }}][sub_modules][{{ $sub_module->id }}][module_actions][]"
                                                                    value="{{ $adm_sub_mod_action->id }}" class="form-check-input moduleSubAction">
                                                                <label class="form-check-label mt-2">{{ $adm_sub_mod_action->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach


                                </div>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
    </script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>

<script>
    document.getElementById('checkAll').addEventListener('click', function() {
    // Check all checkboxes with class .module, .moduleAction, .subModule, and .moduleSubAction
    document.querySelectorAll('.module, .moduleAction, .subModule, .moduleSubAction').forEach(function(checkbox) {
        checkbox.checked = true;
    });
});

document.getElementById('uncheckAll').addEventListener('click', function() {
    // Uncheck all checkboxes with class .module, .moduleAction, .subModule, and .moduleSubAction
    document.querySelectorAll('.module, .moduleAction, .subModule, .moduleSubAction').forEach(function(checkbox) {
        checkbox.checked = false;
    });
});

// Handle clicking on module checkboxes to toggle all actions under the module
document.querySelectorAll('.module').forEach(function(moduleCheckbox) {
    moduleCheckbox.addEventListener('change', function() {
        // Find all the action checkboxes under this module
        const moduleActions = this.closest('.card').querySelectorAll('.moduleAction');
        
        // Set all module actions to checked or unchecked based on the module checkbox state
        moduleActions.forEach(function(actionCheckbox) {
            actionCheckbox.checked = moduleCheckbox.checked;
        });
        
        // Also, check/uncheck the sub-modules if the module is checked
        const subModules = this.closest('.card').querySelectorAll('.subModule');
        subModules.forEach(function(subModuleCheckbox) {
            subModuleCheckbox.checked = moduleCheckbox.checked;
        });
        
        // Now toggle all sub-module actions based on the sub-module checkbox
        const subModuleActions = this.closest('.card').querySelectorAll('.moduleSubAction');
        subModuleActions.forEach(function(subModuleActionCheckbox) {
            subModuleActionCheckbox.checked = moduleCheckbox.checked;
        });
    });
});

// Handle clicking on sub-module checkboxes to toggle all actions under the sub-module
document.querySelectorAll('.subModule').forEach(function(subModuleCheckbox) {
    subModuleCheckbox.addEventListener('change', function() {
        // Find all the action checkboxes under this sub-module
        const subModuleActions = this.closest('.sub-module').querySelectorAll('.moduleSubAction');
        
        // Set all sub-module actions to checked or unchecked based on the sub-module checkbox state
        subModuleActions.forEach(function(subModuleActionCheckbox) {
            subModuleActionCheckbox.checked = subModuleCheckbox.checked;
        });
        
        // Check if the parent module should be checked
        const moduleCheckbox = this.closest('.card').querySelector('.module');
        moduleCheckbox.checked = true; // Mark the module checkbox as checked when any sub-module is checked
    });
});

// Handle clicking on module action checkboxes to check the module if all actions are checked
document.querySelectorAll('.moduleAction').forEach(function(moduleActionCheckbox) {
    moduleActionCheckbox.addEventListener('change', function() {
        const moduleCard = this.closest('.card'); // Get the closest module card
        const moduleCheckbox = moduleCard.querySelector('.module'); // Find the module checkbox
        const allActions = moduleCard.querySelectorAll('.moduleAction'); // Get all module actions under this module
        
        // Check if all module actions are checked
        const allChecked = Array.from(allActions).every(function(action) {
            return action.checked;
        });
        
        // If all actions are checked, check the module checkbox
        moduleCheckbox.checked = allChecked;
    });
});

// Handle clicking on sub-module action checkboxes to check the sub-module and module
document.querySelectorAll('.moduleSubAction').forEach(function (subModuleActionCheckbox) {
    subModuleActionCheckbox.addEventListener('change', function () {
        const subModuleCard = this.closest('.sub-module'); // Get the closest sub-module container
        const subModuleCheckbox = subModuleCard.querySelector('.subModule'); // Find the sub-module checkbox
        const moduleCheckbox = subModuleCard.closest('.card').querySelector('.module'); // Find the main module checkbox

        // Check the sub-module if at least one sub-module action is checked
        const anySubActionChecked = Array.from(subModuleCard.querySelectorAll('.moduleSubAction')).some(function (action) {
            return action.checked;
        });
        subModuleCheckbox.checked = anySubActionChecked;

        // Check the main module if at least one sub-module is checked
        const anySubModuleChecked = Array.from(subModuleCard.closest('.card').querySelectorAll('.subModule')).some(function (subModule) {
            return subModule.checked;
        });
        moduleCheckbox.checked = anySubModuleChecked;
    });
});


</script>

    @endsection