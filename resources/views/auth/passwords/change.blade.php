@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Change Password
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('account.password.update') }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >

                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="program-password" class="form-label fw-bold">New Password</label>
                            <input type="password" class="form-control" id="program-password"
                                name="password"
                                required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="program-password-confirmation" class="form-label fw-bold">Confirm New Password</label>
                            <input type="password" class="form-control" id="program-password-confirmation"
                                name="password_confirmation"
                                required
                            />
                        </div>

                    </div>
                    <div class="card-body border-top">

                        <div class="form-group mb-0">
                            <label for="program-current-password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="program-current-password"
                                name="current_password"
                                required
                            />
                        </div>

                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Submit Changes
                    </button>
                </div>

                @csrf
            </form>

        </div>
    </div>
</div>
@endsection
