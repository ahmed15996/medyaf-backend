@php
    $role = App\Models\Role::where('id' , $id)->first();
@endphp


<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="roles-update">
            <a href="{{ route('admin.roles.edit' , $role->id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="roles-delete">
            <a href="{{ route('admin.roles.destroy' , $role->id) }}" data-id="{{ $role->id }}" class="link-danger fs-15 item-delete icon4" ><i class="ri-delete-bin-line"></i></a>
        </x-permission>

    </div>


</td>



