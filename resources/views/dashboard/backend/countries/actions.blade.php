
@php
    $country = App\Models\Country::where('id' , $id)->first();
@endphp
<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="countries-update">
            <a href="{{ route('admin.countries.edit' , $country->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        <x-permission name="countries-delete">
            <a href="{{ route('admin.countries.destroy' , $country->id ) }}" data-id="{{ $country->id }}" class="text-danger d-inline-block remove-item-btn item-delete"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>




