@include('layouts.navs.menu-item', [
    'label' => 'Suppliers',
    'url' => route('suppliers.index'),
    'active' => request()->is('suppliers', 'suppliers/*'),
    'separator' => false,
    'icon' => 'bi bi-truck',
])

@include('layouts.navs.menu-item', [
    'label' => 'Manage Medicine',
    'class' => 'has-children text-primary',
    'url' => route('medicines.index'),
    'active' => request()->is('medicines', 'medicines/*', 'categories', 'categories/*', 'units', 'units/*'),
    'icon' => 'bi bi-diagram-2-fill',
    'separator' => false,
])

@if (request()->is('medicines', 'medicines/*', 'medicine-types', 'medicine-types/*', 'categories', 'categories/*', 'units', 'units/*'))
    @include('layouts.navs.menu-item', [
        'label' => 'Medicines',
        'url' => route('medicines.index'),
        'active' => request()->is('medicines', 'medicines/*'),
        'child' => true,
        'icon' => 'bi bi-thermometer-half',
        'separator' => false,
    ])
    @include('layouts.navs.menu-item', [
        'label' => 'Type',
        'url' => route('medicine-types.index'),
        'active' => request()->is('medicine-types', 'medicine-types/*'),
        'child' => true,
        'icon' => 'bi bi-circle-half',
        'separator' => false,
    ])
    @include('layouts.navs.menu-item', [
        'label' => 'Categories',
        'url' => route('categories.index'),
        'active' => request()->is('categories', 'categories/*'),
        'child' => true,
        'icon' => 'bi bi-collection',
        'separator' => false,
    ])
    @include('layouts.navs.menu-item', [
        'label' => 'Units',
        'url' => route('units.index'),
        'active' => request()->is('units', 'units/*'),
        'child' => true,
        'icon' => 'bi bi-rulers',
        'separator' => false,
    ])
@endif

@include('layouts.navs.menu-item', [
    'label' => 'POS',
    'url' => route('users.index'),
    'active' => request()->is(),
    'separator' => false,
    'icon' => 'bi bi-person',
])

@include('layouts.navs.menu-item', [
    'label' => 'Manage Accounts',
    'url' => route('users.index'),
    'active' => request()->is('users', 'users/*'),
    'separator' => false,
    'icon' => 'bi bi-person',
])
