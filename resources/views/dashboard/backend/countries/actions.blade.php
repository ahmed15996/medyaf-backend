
@php
    $country = App\Models\Country::where('id' , $id)->first();
@endphp
<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="countries-update">
            <a href="{{ route('admin.countries.edit' , $country->id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="countries-delete">
            <a href="{{ route('admin.countries.destroy' , $country->id ) }}" data-id="{{ $country->id }}" class="link-danger fs-15 item-delete icon4" ><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>




