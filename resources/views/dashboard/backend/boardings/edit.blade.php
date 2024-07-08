@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_boarding') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <x-content add_module="{{ __('models.edit_boarding') }}" name_module="{{ __('models.boardings') }}" route="{{ route('admin.boardings.index') }}"/>


        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.boardings.update' , $board->id) }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf


                    @include('dashboard.backend.boardings._inputs')


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
