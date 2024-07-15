@php
    $admin = App\Models\Admin::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="admins-update">
            <a href="{{ route('admin.admins.edit' , $admin->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        <x-permission name="admins-delete">
            <a href="{{ route('admin.admins.destroy', $admin->id) }}" data-id="{{ $admin->id }}" class="text-danger d-inline-block remove-item-btn item-delete"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>








