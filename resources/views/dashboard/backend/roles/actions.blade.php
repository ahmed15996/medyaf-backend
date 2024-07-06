<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="roles-update">
            <a href="{{ route('admin.roles.edit' , $id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="roles-delete">
            <a href="#" class="link-danger fs-15 icon4" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $id }}"><i class="ri-delete-bin-line"></i></a>
        </x-permission>

    </div>


</td>


@php
    $role = App\Models\Role::where('id' , $id)->first();
@endphp

<x-destroy id="deleteRecordModal{{ $id }}" route="{{ route('admin.roles.destroy' , $id) }}" :value="$role->name"/>
