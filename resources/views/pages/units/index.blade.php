@extends('layouts.app')

@section('title', 'Units')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Units
                    </h4>
                </div>
                <div class="text-nowrap">
                    <a href="{{ route('units.create') }}" class="btn btn-primary fw-bold">
                       Add
                    </a>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($units->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $units->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('units.index') }}" method="get" autocomplete="off">
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
                    <table class="table {{ $units->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($units->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Name</th>
                                    <th class="pt-0 border-0">Description</th>
                                    <th class="pt-0 border-0">Status</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($units as $unit)
                                <tr>
                                    <td style="min-width: 200px;">
                                        <strong>
                                            {{ $unit->name }}
                                        </strong>
                                    </td>
                                    <td>{{ $unit->description }}</td>
                                    <td>{!! $unit->status !!}</td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('units.edit', $unit) }}" class="text-secondary">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No units found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $units->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
