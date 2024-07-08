@props([
   'name' , 'label' , 'col' => '' , 'options'
])


<div class="col-lg-{{ $col ? $col : 6 }}">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <select class="form-control js-example-basic-multiple" name="{{ $name }}" id="{{ $name }}">
        <option value="">{{ $label }}</option>
        @foreach ($options as $value => $name)
            <option value="{{ $value }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
