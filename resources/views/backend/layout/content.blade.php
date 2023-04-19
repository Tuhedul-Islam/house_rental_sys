<div class="content-wrapper">
    <!-- Content Header-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @yield('page-title')
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('backend.alert_message')
            @yield('main-content')
        </div>
    </section>
</div>
