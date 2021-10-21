@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Categories
                    </h4>
                </div>
                <div class="text-nowrap">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary fw-bold">
                       Add
                    </a>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($categories->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $categories->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('categories.index') }}" method="get" autocomplete="off">
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
                    <table class="table {{ $categories->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($categories->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Name</th>
                                    <th class="pt-0 border-0">Status</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td style="min-width: 200px;">
                                        <strong>
                                            {{ $category->name }}
                                        </strong>
                                    </td>
                                    <td>{!! $category->status !!}</td>
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('categories.edit', $category) }}" class="text-secondary">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No categories found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $categories->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
