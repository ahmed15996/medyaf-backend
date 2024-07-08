<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="boardings-update">
            <a href="{{ route('admin.boardings.edit' , $id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="boardings-delete">
            <a href="#" class="link-danger fs-15 icon4" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $id }}"><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>


@php
    $board = App\Models\Boarding::where('id' , $id)->first();
@endphp


<x-destroy id="deleteRecordModal{{ $id }}" route="{{ route('admin.boardings.destroy' , $id) }}" :value="$board->title"/>
