

@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.setting') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.setting') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">{{ __('models.setting') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.update-setting' , $setting->id) }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                   @csrf

                   <x-input name="twitter" color="body" i="ri-twitter-fill" text="true" :value=" $setting->twitter" />
                   <x-input name="facebook" color="primary" i="ri-facebook-fill" :value="$setting->facebook" />
                   <x-input name="linkedin" color="info" i="ri-linkedin-fill" :value=" $setting->linkedin" />
                   <x-input name="instagram" color="danger" i="ri-instagram-fill" :value="$setting->instagram" />
                   <x-input name="email" color="success" i="ri-dribbble-fill" :value="$setting->email" />
                   <x-input name="gmail" color="primary" i="ri-pinterest-fill" :value="$setting->gmail" />

                    <x-forms label="{{ __('models.wattsapp') }}"  name="wattsapp" :value="$setting->wattsapp" type="number"/>
                    <x-forms label="{{ __('models.phone') }}"     name="phone" :value="$setting->phone" type="number"/>
                    <x-forms label="{{ __('models.title') }}"     name="title" :value="$setting->title" />
                    <x-textarea label="{{ __('models.desc') }}"  name="desc"  :value="$setting ? $setting->desc : '' " />








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
