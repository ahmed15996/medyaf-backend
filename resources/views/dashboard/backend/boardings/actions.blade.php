@php
    $board = App\Models\Boarding::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="boardings-update">
            <a href="{{ route('admin.boardings.edit' , $board->id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="boardings-delete">
            <a href="{{ route('admin.boardings.destroy' , $board->id) }}" data-id="{{ $board->id }}"  class="link-danger fs-15 item-delete icon4" ><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>




