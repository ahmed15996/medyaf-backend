
@php
    $ques = App\Models\Question::where('id' , $id)->first();
@endphp

{{ \Illuminate\Support\Str::limit($ques->desc , 10 , '...') }}
<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable{{ $ques->id }}"> {{ __('models.see_more') }} </a>

<div class="modal fade" id="exampleModalScrollable{{ $ques->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">{{ __('models.questions') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <h6 class="fs-15">{{ __('models.answer') }}</h6>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="ri-checkbox-circle-fill text-success"></i>
                    </div>
                    <textarea cols="150" rows="12">{{ $ques->desc }}</textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
