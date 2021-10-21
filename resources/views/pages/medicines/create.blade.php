@extends('layouts.app')

@section('title', 'Add Medicine')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8">

            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('medicines.index') }}" class="btn border text-dark px-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        Add Medicine
                    </h4>
                </div>
            </div>

            <x-alerts />

            <form action="{{ route('medicines.store') }}"
                method="post" autocomplete="off" onsubmit="showOverlay();"
            >
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="medicine-name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="medicine-name"
                                value="{{ old('name') }}" required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="medicine-details" class="form-label">Details</label>
                            <input type="text" name="details" class="form-control" id="medicine-details"
                                value="{{ old('details') }}" required
                            />
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-price" class="form-label">Price</label>
                                    <input type="number" name="price" step="any" class="form-control" id="medicine-price"
                                        value="{{ old('price') }}" required
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-selling-price" class="form-label">Selling Price</label>
                                    <input type="number" name="selling_price" step="any" class="form-control" id="medicine-selling-price"
                                        value="{{ old('selling_price') }}" required
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-quantity" class="form-label">Quantity</label>
                                    <input type="number" name="quantity" step="any" class="form-control" id="medicine-quantity"
                                        value="{{ old('quantity') }}" required
                                    />
                                </div>
                            </div>
                             <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-supplier" class="form-label">Supplier</label>
                                    <select name="supplier_id" id="medicine-supplier" class="form-select">
                                        <option value=""></option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}
                                            >
                                                {{ $supplier->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-type" class="form-label">Medicine Type</label>
                                    <select name="type_id" id="medicine-type" class="form-select">
                                        <option value=""></option>
                                        @foreach ($medicineTypes as $medicineType)
                                            <option value="{{ $medicineType->id }}"
                                                {{ old('type_id') == $medicineType->id ? 'selected' : '' }}
                                            >
                                                {{ $medicineType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-category" class="form-label">Category</label>
                                    <select name="category_id" id="medicine-category" class="form-select">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="medicine-measurement" class="form-label">Measurements</label>
                                    <input type="text" name="measurement" class="form-control" id="medicine-measurement"
                                        value="{{ old('measurement') }}" required
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="medicine-unit" class="form-label">Unit</label>
                                    <select name="unit_id" id="medicine-unit" class="form-select">
                                        <option value=""></option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ old('unit_id') == $unit->id ? 'selected' : '' }}
                                            >
                                                {{ $unit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-barcode" class="form-label">Barcode Number</label>
                                    <input type="number" name="barcode_number" class="form-control" id="medicine-barcode"
                                        value="{{ old('barcode_number') }}" required
                                    />
                                </div>
                            </div>
                             <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="medicine-expiry-date" class="form-label">Expiry Date</label>
                                    <input type="date" name="expired_at" class="form-control" id="medicine-expiry-date"
                                        value="{{ old('expired_at') }}" required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 user-select-none">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is-prescribed"
                                    name="is_prescribed" value="1"
                                />
                                <label class="form-check-label" for="is-prescribed">Please check if prescribed by doctor.</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>

                @csrf
            </form>

        </div>
    </div>
</div>
@endsection
