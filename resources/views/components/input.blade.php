@props([
   'name' , 'i' , 'color' , 'value' => '' , 'text' => ''
])



<div class="mb-3 d-flex">
    <div class="avatar-xs d-block flex-shrink-0 me-3">
        <span class="avatar-title rounded-circle fs-16 bg-{{ $color }} {{ $text ? 'text-body' : '' }}  shadow">
            <i class="{{ $i }}"></i>
        </span>
    </div>
    <input type="text"  class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $name }}" value="{{ $value }}">
</div>

@error($name)
    <span class="text-danger">
        <small class="errorTxt">{{ $message }}</small>
    </span>
@enderror
