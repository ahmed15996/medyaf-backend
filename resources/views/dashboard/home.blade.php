@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.home') }}
@endsection


@section('content')


<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">{{ __('models.good_morning') }}, {{ auth('admin')->user()->name }}!</h4>
                            <p class="text-muted mb-0">{{ __('models.happening') }}.</p>
                        </div>

                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">



                {{--  <x-statics label="{{ __('models.roles') }}" color="primary" :value="$roles" route="{{ route('admin.roles.index') }}"/>  --}}

            </div> <!-- end row-->








        </div>

    </div> <!-- end col -->


</div>


@endsection
