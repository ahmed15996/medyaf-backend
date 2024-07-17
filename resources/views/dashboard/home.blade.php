@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.home') }}
@endsection


@section('content')


<div class="row">
    <div class="col">

        <div class="h-100">
            {{--  header  --}}
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

            {{--  charts  --}}
            <div class="row">

               @include('dashboard.charts')


            </div>

            {{--  circles  --}}
            <div class="row">


                {{--  email , gmail , apple  --}}
                <div class="col-xl-6 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ __('models.user_type') }}</h4>

                        </div>

                        <div class="card-body">

                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-12 mb-3">
                                        {{ __('models.users') }}
                                    </h6>
                                    <h4 class="fs- mb-0">{{ $users }}</h4>

                                </div><!-- end col -->
                                <div class="col-6">
                                    <div class="text-center">
                                        <img src="assets/images/illustrator-1.png" class="img-fluid" alt="">
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                            <div class="mt-3 pt-2">
                                <div class="progress progress-lg rounded-pill">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $apple_users }}%" aria-valuenow="{{ $apple_users }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $gmail_users }}%" aria-valuenow="{{ $gmail_users }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $email_users }}%" aria-valuenow="{{ $email_users }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div><!-- end -->

                            <div class="mt-3 pt-2">

                                {{--  apple  --}}
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-primary me-2"></i>Apple
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <p class="mb-0">{{ $apple_users }}%</p>
                                    </div>
                                </div>

                                {{--  gmail  --}}
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-success me-2"></i>Gmail
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <p class="mb-0">{{ $gmail_users }}%</p>
                                    </div>
                                </div>

                                {{--  email  --}}
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-warning me-2"></i>Email
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <p class="mb-0">{{ $email_users }}%</p>
                                    </div>
                                </div><!-- end -->

                            </div><!-- end -->



                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>



                {{-- ipone , andariod  --}}
                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ __('models.phone_type') }}</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div id="user_device_pie_charts" data-iphone-users="{{ $iPhone_users }}" data-android-users="{{ $android_users }}" data-colors='["--vz-warning", "--vz-info"]'></div>

                            <div class="table-responsive mt-3">
                                <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                                    <tbody class="border-0">
                                        <tr>
                                            <td>
                                                <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i> Iphone </h4>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>{{ round(($iPhone_users / $users) * 100, 2) }}%</p>
                                            </td>
                                            <td class="text-end">
                                                <p class="text-warning fw-medium fs-12 mb-0"> {{ $iPhone_users }}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-info me-2"></i> Android</h4>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>{{ round(($android_users / $users) * 100, 2) }}%</p>
                                            </td>
                                            <td class="text-end">
                                                <p class="text-info fw-medium fs-12 mb-0"> {{ $android_users }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>

                {{--  top users  --}}
                <div class="col-xl-6 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ __('models.top_users') }}</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Current Year</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-responsive table-card">


                                <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col" style="width: 62;">{{ __('models.name') }}</th>
                                                <th scope="col">{{ __('models.email') }}</th>
                                                <th scope="col">{{ __('models.events_count') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if ($top_users->count() > 0)
                                            @foreach ( $top_users as $user)

                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.users.show' , $user->id) }}">{{ $user->name }}</a>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user['events_count'] }}</td>
                                                </tr>

                                            @endforeach

                                        @endif

                                        </tbody><!-- end tbody -->

                                    </table>



                            </div><!-- end -->
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div>

                {{--  top pachages  --}}
                <div class="col-xl-6 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ __('models.top_events') }}</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Current Year</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width: 62;">{{ __('models.price') }}</th>
                                            <th scope="col">{{ __('models.count') }}</th>
                                            <th scope="col">{{ __('models.user_events') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($top_packages->count() > 0)
                                        @foreach ($top_packages as $package)
                                            <tr>
                                                <td>{{ $package->price }}</td>
                                                <td>{{ $package->count }}</td>
                                                <td>{{ $package->event_users }}</td>
                                            </tr><!-- end -->
                                        @endforeach
                                    @endif

                                    </tbody><!-- end tbody -->
                                </table>
                            </div><!-- end -->
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div>


            </div>


            {{--  statics  --}}
            <div class="row">


                <x-statics label="{{ __('models.roles') }}" color="info"     :value="$roles" route="{{ route('admin.roles.index') }}"/>
                <x-statics label="{{ __('models.admins') }}" color="primary"    :value="$admins" route="{{ route('admin.admins.index') }}"/>
                <x-statics label="{{ __('models.users') }}" color="danger"     :value="$users" route="{{ route('admin.users.index') }}"/>
                <x-statics label="{{ __('models.countries') }}" color="success" :value="$countries" route="{{ route('admin.countries.index') }}"/>
                <x-statics label="{{ __('models.events') }}" color="primary"    :value="$events" route="{{ route('admin.events.index') }}"/>
                <x-statics label="{{ __('models.parties') }}" color="primary"   :value="$parties" route="{{ route('admin.parties.index') }}"/>



            </div>


            {{--  parties today  --}}
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



        </div>

    </div> <!-- end col -->


</div>


@endsection


@section('js')

    <script src="{{ asset('dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/dashboard-analytics.init.js') }}"></script>

@endsection

