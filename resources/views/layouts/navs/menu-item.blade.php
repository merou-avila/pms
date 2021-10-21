<li class="d-block {{ (isset($child) and $child) ? 'is-child' : '' }} {{ isset($class) ? $class : '' }} {{ $active ? 'active' : '' }}">
    <a href="{{ $url }}"
        class="d-block ps-4 pe-3 text-decoration-none rounded-right position-relative text-nowrap overflow-hidden text-overflow-ellipsis"
    >
        <span class="{{ (isset($child) and $child) ? 'd-block ps-3' : '' }}">
            <i class="{{ $icon }} fa-fw me-2"></i>{{ $label }}
        </span>
    </a>
</li>
@if ($separator == 'true')
<li class="d-block py-2"></li>
@endif
