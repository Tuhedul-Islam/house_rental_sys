<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!--3 line menu icon-->
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown" title="Notifications">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <!-- Language -->
        <li class="nav-item bg-light" title="Language">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    @if(app()->getLocale()=='en')
                        {{ 'English' }}
                    @else
                        {{ 'Bangla' }}
                    @endif
                </a>
                <div class="dropdown-menu w-100">
                    <ul class="profile-img-dropdown-list">
                        <li><a class="dropdown-item language-dropdown-list-a" href="{{ url('settings/change-language/en') }}">English</a></li>
                        <li><a class="dropdown-item language-dropdown-list-a" href="{{ url('settings/change-language/bn') }}">Bangla</a></li>
                    </ul>
                </div>
            </div>
        </li>

        <!-- Profile -->
        <li class="nav-item" title="Profile">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-image-dropdown" src="{{ asset('frequently-changing/files/profile-img/profile-img.jpg') }}" alt="">
                </a>
                <div class="dropdown-menu w-300">
                    <div class="profile-img-dropdown_header align-items-center">
                        <div class="profile_img_box align-items-center" style="display: inline-flex;">
                            <img class="profile-img-div" src="{{ asset('frequently-changing/files/profile-img/profile-img.jpg') }}" alt="">
                            <p class="mb-0 font-weight-bold text-gray">Profile Name</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="btn btn-danger font-weight-bold mr-1" role="button" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log out
                                </a>
                            </form>
                        </div>
                    </div>
                    <ul class="profile-img-dropdown-list">
                        <li><a class="dropdown-item profile-img-dropdown-list-a" href="{{ url('user-profile') }}">Profile Details</a></li>
                        <li><a class="dropdown-item profile-img-dropdown-list-a" href="{{ url('change-password') }}">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- Full-screen -->
        <li class="nav-item" title="Fullscreen">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Logout icon -->
        <li class="nav-item" title="Logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" role="button" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </form>
        </li>
    </ul>
</nav>
