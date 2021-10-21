@if (count($errors) > 0)
    <div class="alert alert-danger user-select-none px-3">
        <ul class="m-0 p-0">
            @foreach ($errors->all() as $error)
                <li class="d-block">
                    <div class="d-flex">
                        <div class="me-2">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div class="flex-fill">
                            {!! $error !!}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
