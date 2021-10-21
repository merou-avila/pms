<nav class="bg-white border-bottom py-2 shadow-sm fixed-top user-select-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="d-flex w-100 py-1">
                    <div class="pr-1 d-flex">
                        <div class="d-lg-none">
                            <button class="btn btn-white main-menu-trigger px-2" type="button"
                                onclick="toggleMainNav()"
                            >
                                <span class="px-1px text-primary">
                                    <i class="bi bi-list me-2 fs-4"></i>
                                </span>
                            </button>
                        </div>
                        <div class="brand d-none d-lg-inline-block pr-1">
                            <a href="{{ route(auth()->check() ? 'dashboard' : 'login') }}"
                                class="d-flex align-items-center"
                            >
                                <h4 class="fw-bold">PMS</h4>
                            </a>
                        </div>
                    </div>
                    <div class="flex-fill">
                    </div>

                    @auth
                        <div class="ml-auto">
                            <div class="dropdown">
                                <button class="btn btn-white px-2 dropdown-toggle" type="button"
                                    id="upanel-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                >
                                    <span class="d-flex align-items-center px-1">
                                        <div class="text-primary">
                                            <span class="fw-bold">{{ auth()->user()->name }}</span class="fw-bold"> <i class="fa fa-caret-down ms-1"></i>
                                        </div>
                                        <span class="d-none d-inline-block ml-2 text-uppercase font-weight-bold overflow-hidden text-overflow-ellipsis"
                                            style="max-width: 90px;"
                                        >
                                            {{ auth()->user()->first_name }}
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="upanel-dropdown">
                                        <a class="dropdown-item {{ request()->is('account/profile') ? 'active' : '' }} text-primary"
                                            href="{{ route('account.profile') }}"
                                        >
                                            Profile
                                        </a>
                                        <a class="dropdown-item {{ request()->is('account/password') ? 'active' : '' }} text-primary"
                                            href="{{ route('account.password') }}"
                                        >
                                            Change Password
                                        </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-primary" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); showOverlay();"
                                    >
                                        Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</nav>
