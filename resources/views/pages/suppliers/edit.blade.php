@extends('layouts.app')

@section('title', 'Edit Supplier Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">

            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('suppliers.index') }}" class="btn border text-dark px-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Edit Supplier Details
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('suppliers.update', $supplier) }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="supplier-name" class="form-label">Supplier Name</label>
                            <input type="text" name="name" class="form-control" id="supplier-name"
                                value="{{ old('name', $supplier->name) }}" required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="supplier-email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="supplier-email"
                                value="{{ old('email', $supplier->email) }}" required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="supplier-contact-number" class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" id="supplier-contact-number"
                                value="{{ old('contact_number', $supplier->contact_number) }}" required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="supplier-address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="supplier-address"
                                value="{{ old('address', $supplier->address) }}" required
                            />
                        </div>

                        <div class="mb-0 user-select-none">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is-active"
                                    name="is_active" value="1"
                                    {{ $supplier->is_active ? 'checked' : '' }}
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
