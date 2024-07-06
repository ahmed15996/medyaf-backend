<td>
    <div class="hstack gap-3 flex-wrap">
            <a href="{{ route('admin.users.edit' , $id) }}" class="link-success fs-15 icon1"><i class="ri-eye-2-line"></i></a>

        <x-permission name="users-delete">
            <a href="#" class="link-danger fs-15 icon4" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $id }}"><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>


@php
    $user = App\Models\User::where('id' , $id)->first();
@endphp


<x-destroy id="deleteRecordModal{{ $id }}" route="{{ route('admin.users.destroy' , $id) }}" :value="$user->name"/>
