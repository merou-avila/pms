@extends('layouts.auth')

@section('content')

<div class="col-12 col-md-6 col-lg-3 py-lg-5 mt-5 pt-5">

    <div class="card p-3">

        <div class="card-body">
            <h3 class="fw-bold mb-3">
                Log In
            </h3>
            <form action="{{ route('login') }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >

                <div class="form-group position-relative user-select-none mb-3">
                    <label for="auth-email" class="form-label">
                        Email
                    </label>
                    <input id="auth-email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group position-relative user-select-none">
                    <label for="auth-password" class="form-label">
                        Passsword
                    </label>
                    <input id="auth-password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4 d-flex align-items-center">
                    <div class="flex-fill">

                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bold px-3 text-nowrap">
                        <i class="fa fa-sign-in-alt me-2"></i> Log In
                    </button>
                </div>
{{--
                <div class="mt-4 text-secondary">
                    <small class="d-block">
                        <a href="{{ route('password.request') }}" class="font-weight-bold">Forgot Password</a>
                    </small>
                </div> --}}

             {{--    <a href="{{ route('register') }}" class="btn border bg-white shadow-sm btn-block font-weight-bold">
                    <i class="fa fa-user-plus text-primary px-1"></i>Create An Account
                </a> --}}

                @csrf
            </form>

        </div>
    </div>

</div>

@endsection
