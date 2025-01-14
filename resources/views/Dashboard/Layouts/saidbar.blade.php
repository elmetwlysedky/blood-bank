
<div class="page-content">
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{asset('Dashboard/global_assets/images/logo_light.png')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold"></div>
                        <div class="font-size-xs opacity-50">
                             <!-- <i class="icon-pin font-size-sm"></i> &nbsp; -->
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                         <!-- <a href="#" class="text-white"><i class="icon-cog3"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{__('main.main')}}</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>{{__('main.main')}}</span>

                    </a>
                </li>

                <li class="nav-item nav-item-submenu">
                    {{--                    @if(auth()->user()->hasPermission('users-read'))--}}
                    <a href="{{route('user.index')}}" class="nav-link"><i class="icon-user-tie mr-3"></i> <span>{{__('main.employees')}}</span></a>
                    {{--                    @endif--}}
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="{{route('client.index')}} " class="nav-link"><i class="icon-users mr-3"></i> <span>{{__('main.clients')}}</span></a>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="{{route('donation_request.index')}}" class="nav-link"><i class="icon-stack-text mr-3"></i><span> {{__( 'main.donation_requests')}}</span></a>
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-grid6 mr-3 "></i><span> {{__( 'main.categories')}}</span></a>
                    <ul class="nav nav-group-sub">
                        <li class="nav-item"><a href="{{route('category.create')}}" class="nav-link"> {{__( 'main.create')}} {{__( 'main.categories')}}</a></li>
                        <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link">{{__( 'main.table')}} {{__( 'main.categories')}}</a></li>
                    </ul>
                </li>

                @can('edit articles')


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="fab fa-product-hunt"></i><span>{{__('main.posts')}}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item"><a href="{{route('post.create')}}" class="nav-link">{{__( 'main.create')}}  {{__('main.posts')}}</a></li>
                        <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link">{{__( 'main.table')}} {{__('main.posts')}}</a></li>

                    </ul>
                </li>
                @endcan



                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>{{__('main.add')}} {{__('main.admin')}} </span></a>

                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-calculator">
                        </i> <span>{{__('main.invoices')}}</span></a>
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="{{route('permission.create')}}" class="nav-link"><i class="icon-gear"></i><span>{{__('main.setting')}}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item"><a href="{{route('permission.index')}}" class="nav-link">{{__( 'main.permissions')}}  </a></li>
                        <li class="nav-item"><a href="{{route('role.index')}}" class="nav-link">{{__( 'main.roles')}} </a></li>

                    </ul>
                </li>

            <!-- /forms -->
            </ul>

        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
