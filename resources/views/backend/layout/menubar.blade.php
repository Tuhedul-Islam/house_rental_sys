@php
    $root_url = $app->make('url')->to('/');
    $full_url = request()->url();
    $sub_url = str_replace($root_url, '', $full_url);
    $display_block = 'Style=display:block';
    //$segment1 = Request::segment(1);
    //dd($root_url, request()->url(), $sub_url);
    $all_roles = \Spatie\Permission\Models\Role::all()->pluck('name')->toArray();
    $user_roles = auth()->user()->getRoleNames()->toArray();
    $permissions_via_roles = auth()->user()->getPermissionsViaRoles();
    $user_all_permissions = auth()->user()->getAllPermissions();
    //dd($all_roles, $user_roles, $permissions_via_roles, $user_all_permissions);
@endphp

<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('frequently-changing/files/favicon/favicon.ico') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-bolder">{{ strtoupper('Home Rent') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                @if(auth()->user()->hasAnyRole($all_roles))
                <?php $menu_open = (Request::is('dashboard*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif


                <!-- User Management -->
                @if(auth()->user()->hasAnyRole($all_roles))
                <?php $menu_open = (Request::is('users*') || Request::is('house-owners*') || Request::is('customers*'))? 'menu-is-opening menu-open':''; ?>
                @canany(['user-list','house-owner-list','customer-list'])
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        @if(auth()->user()->can('user-list'))
                        <li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link {{ Request::is('users*')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('house-owner-list'))
                        <li class="nav-item">
                            <a href="{{ url('/house-owners') }}" class="nav-link {{ Request::is('house-owners*')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>House Owner List</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('customer-list'))
                        <li class="nav-item">
                            <a href="{{ url('/customers') }}" class="nav-link {{ Request::is('customers*')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Customers List</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcanany
                @endif


                <!-- Role Management -->
                @if(auth()->user()->hasAnyRole($all_roles))
                <?php $menu_open = (Request::is('roles*') || Request::is('permissions*') || Request::is('modules*'))? 'menu-is-opening menu-open':''; ?>
                @canany(['module-list','role-list','permission-list'])
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            Role Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        @if(auth()->user()->can('module-list'))
                        <li class="nav-item">
                            <a href="{{ url('/modules') }}" class="nav-link {{ (Request::is('modules*'))? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Module List</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('role-list'))
                        <li class="nav-item">
                            <a href="{{ url('/roles') }}" class="nav-link {{ (Request::is('roles*'))? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('permission-list'))
                        <li class="nav-item">
                            <a href="{{ url('/permissions') }}" class="nav-link {{ (Request::is('permissions*'))? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Permission List</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcanany
                @endif


                <!-- Master Data Setup -->
                @if(auth()->user()->hasAnyRole($all_roles))
                <?php
                $menu_open = (Request::is('branch*') || Request::is('item-type*') || Request::is('item-category*') || Request::is('item-sub_category*') || Request::is('unit*') || Request::is('concerns*') || Request::is('counter-desks*') || Request::is('offer-promotion*'))? 'menu-is-opening menu-open':'';
                ?>
                @canany(['concern-list'])
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-tools"></i>
                        <p>
                            Master Data Setup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        <?php $concern_menu_open = (Request::is('slider-list*'))? 'menu-is-opening menu-open':''; ?>
                        @if(auth()->user()->can('slider-list'))
                        <li class="nav-item {{ $concern_menu_open }}">
                            <a href="{{ url('slider-list') }}" class="nav-link {{ (Request::is('slider-list/*'))? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('about-us'))
                            <li class="nav-item {{ $concern_menu_open }}">
                                <a href="{{ url('about-us') }}" class="nav-link {{ (Request::is('about-us/*'))? 'active':'' }}">
                                    <i class="far fa-circle mr-1"></i>
                                    <p>About Us</p>
                                </a>
                            </li>
                        @endif
                        @if(auth()->user()->can('contact-us'))
                            <li class="nav-item {{ $concern_menu_open }}">
                                <a href="{{ url('contact-us') }}" class="nav-link {{ (Request::is('contact-us/*'))? 'active':'' }}">
                                    <i class="far fa-circle mr-1"></i>
                                    <p>Contact Us</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @endcanany
                @endif


                <!-- System Management -->
                @if(auth()->user()->hasAnyRole($all_roles))
                <?php $menu_open = (Request::is('settings*'))? 'menu-is-opening menu-open':''; ?>
                @canany(['system-setting','language-setting','email-setting', 'activity-log'])
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            System Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        @if(auth()->user()->can('system-setting'))
                        <li class="nav-item">
                            <a href="{{ url('/settings/system-setting') }}" class="nav-link {{ (Request::is('settings/system-setting'))? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>System Setting</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('language-setting'))
                        <li class="nav-item">
                            <a href="{{ url('/settings/language-setting') }}" class="nav-link {{ ( (Request::is('settings/language-setting')) || (Request::is('settings/language/*')) )? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>Language Setting</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('email-setting'))
                        <li class="nav-item">
                            <a href="{{ url('/settings/email-setting') }}" class="nav-link {{ (Request::is('settings/email-setting'))? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>Email Setting</p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->can('activity-log'))
                        <li class="nav-item">
                            <a href="{{ url('/modules') }}" class="nav-link {{ ($sub_url=='/modules')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcanany
                @endif


                <!-- Report -->
                @if(auth()->user()->hasAnyRole($all_roles))
                @canany(['report-list'])
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mr-1 fas fa-file-alt"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(auth()->user()->can('report-demo'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle mr-1"></i>
                                <p>Demo 1</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcanany
                @endif
            </ul>
        </nav>
    </div>
</aside>
