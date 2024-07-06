@props([
    'type' => '' , 'name' , 'value' => '' , 'label' , 'col' => '' 
])


<div class="col-md-{{ $col ? $col : '6' }}">
<label for="{{ $name }}">{{ $label }}</label>


<input
type="{{ $type ? $type : 'text' }}"
name="{{ $name }}"
value="{{ old($name , $value) }}"
id="{{ $name }}"
{{ $attributes->class([
'form-control' ,
]) }}
>



@error($name)
    <span class="text-danger">
        <small class="errorTxt">{{ $message }}</small>
    </span>
@enderror

</div>
