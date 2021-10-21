@extends('layouts.app')

@section('title', 'Medicine Types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Medicine Types
                    </h4>
                </div>
                <div class="text-nowrap">
                    <a href="{{ route('medicine-types.create') }}" class="btn btn-primary fw-bold">
                       Add
                    </a>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($types->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $types->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('medicine-types.index') }}" method="get" autocomplete="off">
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
                    <table class="table {{ $types->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($types->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Name</th>
                                    <th class="pt-0 border-0">Status</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td style="min-width: 200px;">
                                        <strong>
                                            {{ $type->name }}
                                        </strong>
                                    </td>
                                    <td>{!! $type->status !!}</td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('medicine-types.edit', $type) }}" class="text-secondary">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No medicine types found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $types->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
