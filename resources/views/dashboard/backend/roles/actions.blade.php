@php
    $role = App\Models\Role::where('id' , $id)->first();
@endphp


<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="roles-update">
            <a href="{{ route('admin.roles.edit' , $role->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        <x-permission name="roles-delete">
            <a href="{{ route('admin.roles.destroy' , $role->id) }}" data-id="{{ $role->id }}" class="text-danger d-inline-block remove-item-btn"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>

    </div>


</td>



