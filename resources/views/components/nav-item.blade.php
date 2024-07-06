@props([
    'route' , 'label'
])


<li class="nav-item">
    <a href="{{ $route }}" class="nav-link" data-key="t-starter"> {{ $label }} </a>
</li>
