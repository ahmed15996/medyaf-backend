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

                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ __('models.party_today') }}</h4>

                            </div><!-- end card header -->
                            @if ($parties_today->count() > 0 )
                                <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                      @foreach ($parties_today as $party )

                                      <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3 shadow">
                                                        <div class="text-center">
                                                            <h5 class="text-muted">{{ $party->date }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">{{ Carbon\Carbon::parse($party->time)->format('h:i A') }}</h5>
                                                    <a href="{{ route('admin.parties.show' , $party->id) }}" class="text-reset fs-14 mb-0">{{ $party->name }}</a>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="avatar-group">

                                                        <div class="avatar-group-item shadow">
                                                            <a href="javascript: void(0);">
                                                                <div class="avatar-xxs">
                                                                    <span class="avatar-title rounded-circle bg-info text-white">
                                                                        {{ $party->users()->count() }}
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->

                                      @endforeach

                                    </ul><!-- end -->

                                </div><!-- end card body -->
                            @else

                            <div class="no_data"> لا توجد مناسبات اليوم</div>
                            @endif
                        </div><!-- end card -->
                    </div><!-- end col -->






                </div>





                <x-statics label="{{ __('models.roles') }}" color="info"     :value="$roles" route="{{ route('admin.roles.index') }}"/>
                <x-statics label="{{ __('models.admins') }}" color="primary"    :value="$admins" route="{{ route('admin.admins.index') }}"/>
                <x-statics label="{{ __('models.users') }}" color="danger"     :value="$users" route="{{ route('admin.users.index') }}"/>
                <x-statics label="{{ __('models.countries') }}" color="success" :value="$countries" route="{{ route('admin.countries.index') }}"/>
                <x-statics label="{{ __('models.events') }}" color="primary"    :value="$events" route="{{ route('admin.events.index') }}"/>
                <x-statics label="{{ __('models.parties') }}" color="primary"   :value="$parties" route="{{ route('admin.parties.index') }}"/>

                <x-statics label="{{ __('models.count_today') }}" color="primary"   :value="$count_today " route="#"/>
                <x-statics label="{{ __('models.count_week') }}" color="primary"    :value="$count_week " route="#"/>
                <x-statics label="{{ __('models.count_month') }}" color="primary"   :value="$count_month " route="#"/>

                <x-statics label="{{ __('models.price_today') }}" color="primary"   :value="$price_today " route="#"/>
                <x-statics label="{{ __('models.price_week') }}" color="primary"    :value="$price_week " route="#"/>
                <x-statics label="{{ __('models.price_month') }}" color="primary"   :value="$price_month " route="#"/>

            </div> <!-- end row-->










        </div>

    </div> <!-- end col -->


</div>


@endsection


