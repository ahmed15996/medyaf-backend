@php
    $board = App\Models\Boarding::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="boardings-update">
            <a href="{{ route('admin.boardings.edit' , $board->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        <x-permission name="boardings-delete">
            <a href="{{ route('admin.boardings.destroy' , $board->id) }}" data-id="{{ $board->id }}"  class="text-danger d-inline-block remove-item-btn"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>




