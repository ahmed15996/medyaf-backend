@php
    $event = App\Models\Event::where('id' , $id)->first();
@endphp


<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="events-update">
            <a href="{{ route('admin.events.edit' , $event->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        {{--  <x-permission name="events-update">
            <a href="{{ route('admin.events.edit' , $event->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-eye-fill fs-16"></i></a>
        </x-permission>  --}}


        <x-permission name="events-delete">
            <a href="{{ route('admin.events.destroy' , $event->id) }}" data-id="{{ $event->id }}" class="text-danger d-inline-block remove-item-btn"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>

