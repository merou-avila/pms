@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('users.index') }}" class="btn border text-dark px-2">
                        <i class="fa fa-arrow-left fa-fw"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Edit User
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('users.update', $user) }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >

                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="user-first-name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="user-first-name" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}" required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="user-last-name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="user-last-name" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}" required
                            />
                        </div>

                        <div class="mb-0">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" class="form-control"
                                name="email" id="user-email" required
                                value="{{ old('email', $user->email) }}"
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
