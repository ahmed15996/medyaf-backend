@php
    $user = App\Models\User::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <a href="{{ route('admin.users.show' , $user->id) }}" class="link-success fs-15 icon3"><i class="ri-eye-2-line"></i></a>
        <x-permission name="users-delete">
            <a href="{{ route('admin.users.destroy' , $user->id) }}" data-id="{{ $user->id }}" class="link-danger fs-15 item-delete icon4"><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>





