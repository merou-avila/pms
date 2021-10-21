@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show px-3" role="alert">
        <ul class="request-status m-0 p-0">
            <li class="d-flex">
                <div class="me-2">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="flex-fill">
                    {!! session('status') !!}
                </div>
            </li>
        </ul>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
