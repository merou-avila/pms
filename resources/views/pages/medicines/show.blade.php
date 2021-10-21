@extends('layouts.app')

@section('title', 'View Medicine')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">



            <div class="mb-4 d-flex">
                <div class="pe-3">
                    <a href="{{ route('medicines.index') }}" class="btn border text-dark px-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="flex-fill pt-1">
                    <h4 class="mb-0 fw-bold">
                        {{ $medicine->name }}
                    </h4>
                    <div class="my-2">
                        {!! $medicine->status !!}
                    </div>
                </div>

                <div>
                    <a href="" class="btn btn-warning"
                        onclick="event.preventDefault(); document.getElementById('generate-barcode').submit(); showOverlay();"
                    >
                        <i class="bi bi-upc-scan me-2"></i>Generate Barcode
                        <form action="{{ route('medicines.generate.barcode', $medicine) }}"
                            method="post" autocomplete="off" target="_blank"
                            id="generate-barcode" class="d-none"
                        >@csrf</form>
                    </a>
                    <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-success">
                        <i class="bi bi-pencil-square me-2"></i>Edit Details
                    </a>
                </div>
            </div>

            <x-alerts />

            @if ($medicine->details)
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <strong>
                                    Description
                                </strong>
                                <div>
                                    <span>
                                        {{ $medicine->details ? : 'No description' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action">
                                <strong>Supplier:</strong>
                                <div>{{ $medicine->supplier->name }}
                                    <small class="d-block">Address: {{ $medicine->supplier->address }}</small>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Price:</strong>
                                <div>{{ number_format($medicine->price, 2) }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Selling Price:</strong>
                                <div>{{ number_format($medicine->selling_price, 2) }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Quantity</strong>
                                <div>{{ $medicine->quantity }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Expiry Date</strong>
                                <div>{{ $medicine->expired_at->format('F d, Y') }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Medicine Type:</strong>
                                <div>{{ $medicine->medicineType->name }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Category:</strong>
                                <div>{{ $medicine->category->name }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Measurement:</strong>
                                <div>{{ $medicine->measurement }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Unit:</strong>
                                <div>{{ $medicine->unit->name }}</div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <strong>Barcode:</strong>
                                <div>{{ $medicine->barcode_number }}</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-6">

                    <form action="{{ route('medicines.upload.photo', $medicine) }}" method="post"
                        autocomplete="off" enctype="multipart/form-data" onsubmit="showOverlay();"
                    >
                        <div class="card shadow-sm mb-3 mb-md-4">
                            <div class="card-body">

                                <div class="mb-3 mb-0">
                                    <label for="medicine-image-file" class="form-label">Upload Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="photo" class="form-control" id="image-medicine-file">
                                        <button type="submit" class="btn btn-primary text-nowrap">
                                            <i class="fa fa-upload me-2"></i>Upload
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @csrf
                    </form>

                    <div class="card-body zoomable p-0"
                        data-photo="{{ route('medicines.show.photo', $medicine) }}"
                    >
                        <img src="{{ route('medicines.show.photo', $medicine) }}" alt=""
                            class="w-100"
                        />
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
