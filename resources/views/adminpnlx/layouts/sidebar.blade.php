<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('Dashboard')}}" class="logo">
                <img src="{{ asset('img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php $getModulePermissions =	getSidebarModule(); ?>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                @if($getModulePermissions->isNotEmpty())
                @foreach($getModulePermissions as $key => $getModulePermission)
                <?php $getSubModulePermission = $getModulePermission?->getAclSubModules; ?>
                <li class="nav-item">
                    @if(isset($getSubModulePermission) && $getSubModulePermission->isEmpty())
                    <a href="{{url($getModulePermission?->path) }}">
                    <!--begin::Svg Icon -->
                    <span class="svg-icon svg-icon-primary svg-icon-2x" style="background-color:white; color: white; margin-right:10px; border-radius:10px;">
                        {!! $getModulePermission->icon !!}
                    </span>
                    <!--end::Svg Icon-->
                        <p>{{ $getModulePermission->title }}</p>
                    </a>
                    @else
                    <a data-bs-toggle="collapse" href="#modelName{{$key}}">
                    <span class="svg-icon svg-icon-primary svg-icon-2x" style="background-color:white; color: white; margin-right:10px; border-radius:10px;">
                        {!! $getModulePermission->icon !!}
                    </span>
                        <p>{{ $getModulePermission->title }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="modelName{{$key}}">
                        <ul class="nav nav-collapse">
                            @foreach($getSubModulePermission as $child)
                            <li>
                                <a href="{{url($child->path ?? '') }}">
                                    <span class="sub-item">{{ $child->title }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </li>
                @endforeach
                @endif
            </ul>

           
        </div>
    </div>
</div>