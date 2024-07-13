

@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.terms') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.terms') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">{{ __('models.terms') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.update-terms') }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')

                    @csrf

                    <x-forms    label="{{ __('models.title_ar') }}" name="title_ar" :value="$terms->title_ar"/>
                    <x-forms    label="{{ __('models.title_en') }}" name="title_en" :value="$terms->title_en"/>
                    <x-textarea label="{{ __('models.desc_ar') }}"  name="desc_ar"  :value="$terms->desc_ar" type= true/>
                    <x-textarea label="{{ __('models.desc_en') }}"  name="desc_en"  :value="$terms->desc_en" type= true/>




                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{ __('models.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
</div>



@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
