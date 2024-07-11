@php
    $event = App\Models\Event::where('id' , $id)->first();
@endphp


<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="events-update">
            <a href="{{ route('admin.events.edit' , $event->id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>


        <x-permission name="events-delete">
            <a href="{{ route('admin.events.destroy' , $event->id) }}" data-id="{{ $event->id }}" class="link-danger fs-15 item-delete icon4"><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>

