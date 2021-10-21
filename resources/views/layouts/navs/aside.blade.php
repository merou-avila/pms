<aside>
    <div class="overflow-auto h-100" data-simplebar>
        <div class="py-4 pr-4 user-select-none">
            <ul class="m-0 p-0">

                <li class="d-block {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="d-block ps-4 pr-3 text-decoration-none rounded-right position-relative">
                            <i class="bi bi-layout-sidebar me-2"></i>Dashboard
                    </a>
                </li>

                <li class="d-block py-2"></li>

                @include('layouts.navs.menu')

            </ul>
        </div>
    </div>
</aside>

<div class="aside-backdrop d-lg-none" onclick="toggleMainNav()"></div>
