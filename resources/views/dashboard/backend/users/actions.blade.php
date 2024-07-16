@php
    $user = App\Models\User::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <a href="{{ route('admin.user-notify' , $user->id) }}" class="text-info d-inline-block edit-item-btn"> <i class="ri-notification-2-fill"></i></a>
        <a href="{{ route('admin.users.show'   , $user->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-eye-fill fs-16"></i></a>
        <x-permission name="users-delete">
            <a href="{{ route('admin.users.destroy' , $user->id) }}" data-id="{{ $user->id }}" class="text-danger d-inline-block remove-item-btn item-delete"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>





