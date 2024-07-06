@props([
   'name' , 'value' , 'label'
])



<div class="custom-control custom-control-primary" style="display: inline-flex;">
    <input type="radio" class="custom-control {{ $name }}" name="{{ $name }}" value="{{ $value }}" />
    <label class="" for="">{{ $label}}</label>
</div>
