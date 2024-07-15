@props([
    'route' , 'label' , 'nav_link' => ''
])


<li class="nav-item">
    <a href="{{ $route }}" class="nav-link {{ $nav_link }}" data-key="t-starter"> {{ $label }} </a>
</li>


