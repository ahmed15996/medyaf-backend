@php
    $ques = App\Models\Question::where('id' , $id)->first();
@endphp

<td>
    <div class="hstack gap-3 flex-wrap">
        <x-permission name="questions-update">
            <a href="{{ route('admin.questions.edit' , $ques->id) }}" class="text-primary d-inline-block edit-item-btn"> <i class="ri-pencil-fill fs-16"></i></a>
        </x-permission>

        <x-permission name="questions-delete">
            <a href="{{ route('admin.questions.destroy' , $ques->id) }}" data-id="{{ $ques->id }}" class="text-danger d-inline-block remove-item-btn item-delete"><i class="ri-delete-bin-5-fill fs-16"></i></a>
        </x-permission>
    </div>
</td>

