@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Profile
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('account.profile.update') }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >

                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="profile-first-name" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control" id="profile-first-name" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}" required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="profile-last-name" class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control" id="profile-last-name" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}" required
                            />
                        </div>

                        <div class="mb-3 mb-0">
                            <label for="profile-name" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="profile-email" name="email"
                                value="{{ old('email', $user->email) }}" required
                            />
                        </div>

                    </div>
                    <div class="card-body border-top">

                        <div class="form-group mb-0">
                            <label for="profile-current-password">Current Password</label>
                            <input type="password" class="form-control" id="profile-current-password"
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
