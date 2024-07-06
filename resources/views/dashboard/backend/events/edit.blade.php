@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_event') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <x-content add_module="{{ __('models.edit_event') }}" name_module="{{ __('models.events') }}" route="{{ route('admin.events.index') }}"/>


        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.events.update' , $event->id) }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf


                    @include('dashboard.backend.events._inputs')


                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{ __('models.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
</div>



@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
