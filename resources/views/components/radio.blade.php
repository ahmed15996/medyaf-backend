@props([
   'name' , 'value' , 'label' , 'icon' => ''
])



<div class="custom-control custom-control-primary" style="display: inline-flex;">
    <input type="radio" class="custom-control {{ $name }} radio" name="{{ $name }}" value="{{ $value }}" />
    <i class="{{ $icon }}"></i> <label class="" for="">{{ $label}}</label>
</div>



