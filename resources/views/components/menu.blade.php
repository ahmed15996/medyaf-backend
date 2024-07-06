@props([
    'name'
])

<li class="nav-item">
    <a class="nav-link menu-link" href="#{{ $name }}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $name }}">
        <i class="ri-mail-star-fill"></i> <span data-key="t-pages">{{ __('models.' . $name) }}</span>
    </a>


    <div class="collapse menu-dropdown" id="{{ $name }}">
        <ul class="nav nav-sm flex-column">

            {{ $slot }}

        </ul>
    </div>
</li>
