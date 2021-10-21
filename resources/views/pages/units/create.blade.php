@extends('layouts.app')

@section('title', 'Add Unit')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('units.index') }}" class="btn border text-dark px-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Add Unit
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('units.store') }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="unit-name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="unit-name"
                                value="{{ old('name') }}" required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="unit-description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="unit-description"
                                value="{{ old('description') }}" required
                            />
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                </div>

                @csrf
            </form>

        </div>
    </div>
</div>
@endsection
