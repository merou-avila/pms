@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Suppliers
                    </h4>
                </div>
                <div class="text-nowrap">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-primary fw-bold">
                       Add
                    </a>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($suppliers->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $suppliers->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('suppliers.index') }}" method="get" autocomplete="off">
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
                    <table class="table {{ $suppliers->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($suppliers->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Supplier Name</th>
                                    <th class="pt-0 border-0">Email</th>
                                    <th class="pt-0 border-0">Contact Number</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr>
                                    <td style="min-width: 200px;">
                                        <strong>
                                            {{ $supplier->name }}
                                        </strong>
                                    </td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->contact_number }}</td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('suppliers.edit', $supplier) }}" class="text-secondary">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No suppliers found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $suppliers->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
