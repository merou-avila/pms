@extends('layouts.app')

@section('title', 'Edit Medicine Type')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('medicine-types.index') }}" class="btn border text-dark px-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Edit Medicine Type
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('medicine-types.update', $medicineType) }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="medicine-type-name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="medicine-type-name"
                                value="{{ old('name', $medicineType->name) }}" required
                            />
                        </div>

                        <div class="mb-0 user-select-none">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is-active"
                                    name="is_active" value="1"
                                    {{ $medicineType->is_active ? 'checked' : '' }}
                                />
                                <label class="form-check-label" for="is-active">Active</label>
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                </div>

                @csrf
            </form>

        </div>
    </div>
</div>
@endsection
