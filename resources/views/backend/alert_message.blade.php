@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close text-light" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fas fa-ban"></i> Error!</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(Session::has('message11'))
    <div class="alert alert-success alert-dismissible fade show">
        <div class="alert-body">
            <p><i class="m-right fa fa-{{ Session::get('sign') ?? 'check' }}"></i>{{ Session::get('message') }}</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('success11'))
    <div class="alert alert-success alert-dismissible fade show">
        <div class="alert-body">
            <p><i class="m-right fa fa-{{ Session::get('sign') ?? 'check' }}"></i>{{ Session::get('success') }}</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('error11'))
    <div class="alert alert-danger alert-dismissible fade show">
        <div class="alert-body">
            <p><i class="m-right fa fa-{{ Session::get('sign') ?? 'check' }}"></i>{{ Session::get('error') }}</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
