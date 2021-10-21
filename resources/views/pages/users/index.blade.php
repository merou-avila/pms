@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="mb-4 d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0 fw-bold">
                        Users
                    </h4>
                </div>
            </div>

            <x-alerts />

            <div class="card shadow-sm overflow-hidden">
                 @if ($users->count() > 0 or ! empty(request()->s))
                    <div class="card-body {{ (! empty(request()->s) and $users->count() == 0) ? 'border-bottom' : '' }}">

                        <form action="{{ route('users.index') }}" method="get" autocomplete="off">
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
                    <table class="table {{ $users->count() > 0 ? 'table-hover' : '' }} mb-0">
                        @if ($users->count() > 0)
                            <thead>
                                <tr>
                                    <th class="pt-0 border-0">Name</th>
                                    <th class="pt-0 border-0">Email</th>
                                    <th class="pt-0 border-0">Role</th>
                                    <th class="pt-0 border-0">&nbsp;</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td style="min-width: 200px;">
                                        <strong>
                                            {{ $user->full_name }}
                                        </strong>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    @if (empty(request()->f))
                                        <td>
                                            {{ $user->role }}
                                        </td>
                                    @endif
                                    <td class="text-end text-nowrap">
                                        <a href="{{ route('users.edit', $user) }}" class="text-secondary">
                                            <i class="fa fa-edit fa-fw"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <x-tr-no-data>No users found</x-tr-no-data>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $users->withQueryString()->links('components.pagination') }}

        </div>
    </div>
</div>
@endsection
