@extends('layouts.app')

@section('title', 'Medicines')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Medicines
                    </h4>
                </div>
                <div class="text-nowrap">
                    <a href="{{ route('medicines.create') }}" class="btn btn-primary fw-bold">
                       Add
                    </a>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($medicines->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $medicines->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('medicines.index') }}" method="get" autocomplete="off">
                            <input type="text" class="form-control"
                                value="{{ request()->s }}" name="s"
                                placeholder="Search"
                            />
                            @if (! empty(request()->r))
                                <input type="hidden" name="r" value="{{ request()->r }}" />
                            @endif
                        </form>

                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table {{ $medicines->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($medicines->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Barcode</th>
                                    <th class="pt-0 border-0">Item Name</th>
                                    <th class="pt-0 border-0">Price</th>
                                    <th class="pt-0 border-0 text-center">Selling Price</th>
                                    <th class="pt-0 border-0 text-center">Quantity</th>
                                    <th class="pt-0 border-0 text-center">Prescription Required</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($medicines as $medicine)
                                <tr>
                                    <td>
                                        <a href="{{ route('medicines.show', $medicine) }}">
                                            <strong>{{ $medicine->barcode_number }}</strong>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('medicines.show', $medicine) }}">
                                            <strong>
                                                {{ $medicine->name }}
                                            </strong>
                                        </a>
                                        <small class="d-block text-muted">
                                            {{ $medicine->supplier->name }}
                                        </small>
                                    </td>
                                    <td>
                                        {{ number_format($medicine->price, 2) }}
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($medicine->selling_price, 2) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $medicine->quantity }}
                                    </td>
                                    <td class="text-center">
                                        {!! $medicine->is_prescribed_label !!}
                                    </td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('medicines.edit', $medicine) }}" class="text-secondary">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No medicines found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $medicines->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
