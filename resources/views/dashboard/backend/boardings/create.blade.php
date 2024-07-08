@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_boarding') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <x-content add_module="{{ __('models.add_boarding') }}" name_module="{{ __('models.boardings') }}" route="{{ route('admin.boardings.index') }}"/>

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.boardings.store') }}" enctype="multipart/form-data" novalidate>

                    @csrf

                    @php
                        $board = '' ;
                    @endphp

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
