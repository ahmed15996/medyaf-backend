@php
    $ques = App\Models\Question::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="questions-update">
            <a href="{{ route('admin.questions.edit' , $ques->id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        </x-permission>

        <x-permission name="questions-delete">
            <a href="{{ route('admin.questions.destroy' , $ques->id) }}" data-id="{{ $ques->id }}" class="link-danger fs-15 item-delete icon4" ><i class="ri-delete-bin-line"></i></a>
        </x-permission>
    </div>
</td>

