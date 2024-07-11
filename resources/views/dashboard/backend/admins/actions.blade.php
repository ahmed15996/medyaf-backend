@php
    $admin = App\Models\Admin::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="admins-update">
            <a href="{{ route('admin.admins.edit' , $admin->id) }}" class="link-success fs-15 "><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="admins-delete">
            <a href="{{ route('admin.admins.destroy', $admin->id) }}" data-id="{{ $admin->id }}" class="link-danger fs-15 item-delete" ><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>








