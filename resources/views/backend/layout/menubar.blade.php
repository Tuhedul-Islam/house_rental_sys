@php
    $root_url = $app->make('url')->to('/');
    $full_url = request()->url();
    $sub_url = str_replace($root_url, '', $full_url);
    $display_block = 'Style="display:block"';
    //$segment1 = Request::segment(1);
    //dd($root_url, request()->url(), $sub_url);
@endphp

<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('frequently-changing/files/favicon/favicon.ico') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-bolder">{{ strtoupper('House Rental System') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <?php $menu_open = (Request::is('dashboard*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- User Management -->
                <?php $menu_open = (Request::is('users*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        <li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Role Management -->
                <?php $menu_open = (Request::is('roles*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            Role Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        <li class="nav-item">
                            <a href="{{ url('/roles') }}" class="nav-link {{ ($sub_url=='/roles')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Module Management -->
                <?php $menu_open = (Request::is('modules*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            Module Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        <li class="nav-item">
                            <a href="{{ url('/modules') }}" class="nav-link {{ ($sub_url=='/modules')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Module List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Master Data Setup -->
                <?php
                $menu_open = (Request::is('branch*') || Request::is('item-type*') || Request::is('item-category*') || Request::is('item-sub_category*') || Request::is('unit*') || Request::is('concerns*') || Request::is('counter-desks*') || Request::is('offer-promotion*'))? 'menu-is-opening menu-open':'';
                ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-tools"></i>
                        <p>
                            Master Data Setup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php $concern_menu_open = (Request::is('concerns*'))? 'menu-is-opening menu-open':''; ?>
                        <li class="nav-item {{ $concern_menu_open }}">
                            <a href="{{ url('concerns') }}" class="nav-link {{ !empty($concern_menu_open) ? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Concern/Stakeholder</p>
                            </a>
                        </li>
                        <?php $offer_promotion = (Request::is('offer-promotion*'))? 'menu-is-opening menu-open':''; ?>
                        <li class="nav-item {{ $offer_promotion }}">
                            <a href="{{ url('offer-promotion') }}" class="nav-link {{ !empty($offer_promotion) ? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Offer and Promotion</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- System Management -->
                <?php $menu_open = (Request::is('modules*'))? 'menu-is-opening menu-open':''; ?>
                <li class="nav-item {{ $menu_open }}">
                    <a href="#" class="nav-link {{ !empty($menu_open) ? 'active':'' }}">
                        <i class="mr-1 fas fa-users"></i>
                        <p>
                            System Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ !empty($menu_open) ? $display_block:'' }}>
                        <li class="nav-item">
                            <a href="{{ url('/settings/system-setting') }}" class="nav-link {{ ($sub_url=='/settings/system-setting')? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>System Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/settings/language-setting') }}" class="nav-link {{ ( (Request::is('settings/language-setting')) || (Request::is('settings/language/*')) )? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>Language Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/settings/email-setting') }}" class="nav-link {{ (Request::is('settings/email-setting'))? 'active':'' }}">
                                <i class="far fa-circle mr-1 ml-1"></i>
                                <p>Email Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/modules') }}" class="nav-link {{ ($sub_url=='/modules')? 'active':'' }}">
                                <i class="far fa-circle mr-1"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Report -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mr-1 fas fa-file-alt"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle mr-1"></i>
                                <p>Demo 1</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
