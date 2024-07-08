@extends('dashboard.layouts.master')

@section('title')
    {{ __('models.user_details') }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('dashboard/assets/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')

    @php
        $count_events = 0 ;
        if($user['events']->count() > 0){
            foreach ($user['events'] as $event) {
            $count_events += $event->event->count ;
            }

        }

        //  Get the number of invitations that were used
        $count_users = 0 ;
        if($user['parties']->count() > 0){
            foreach ($user['parties'] as $party) {
                $count_users += $party->users()->count();
            }

        }

        $total_invataions =  $count_events + 2 ;
    @endphp


    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="{{ asset('storage/admins/1.png')}}" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('storage/admins/1.png')}}" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{  $user->name }}</h3>
                        <p class="text-white text-opacity-75">{{  $user->email }} </p>
                        <p class="text-white text-opacity-75"> {{  $user->type }}</p>
                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $user->country ? $user->country->name : '' }}</div>

                        </div>
                    </div>
                </div>
                <!--end col-->


            </div>
            <!--end row-->
        </div>


        <div class="card">
            <div class="card-body">

                <div class="row mt-4">
                    {{--  count_events  --}}
                    <div class="col-md-3 col-sm-4">
                        <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-2">
                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                        <i class="ri-money-dollar-circle-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">{{ __('models.puy_invataions') }} :</p>
                                    <h5 class="mb-0">{{ $count_events }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  total_invataions  --}}
                    <div class="col-md-3 col-sm-4">
                        <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-2">
                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                        <i class="ri-file-copy-2-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">{{ __('models.total_invataions') }} :</p>
                                    <h5 class="mb-0">{{ $total_invataions }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  invataions_used  --}}
                    <div class="col-md-3 col-sm-4">
                        <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-2">
                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                        <i class="ri-stack-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">{{ __('models.invataions_used') }} :</p>
                                    <h5 class="mb-0">{{ $count_users }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- remaining_invitations   --}}
                    <div class="col-md-3 col-sm-4">
                        <div class="p-2 border border-dashed rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-2">
                                    <div class="avatar-title rounded bg-transparent text-info fs-24">
                                        <i class="ri-inbox-archive-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">{{ __('models.remaining_invitations') }} :</p>
                                    <h5 class="mb-0">{{ $total_invataions - $count_users }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end card body -->
        </div><!-- end card -->



        <div class="row">
            <div class="col-lg-12">
                <div>

                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">


                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ __('models.owner') }}</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">{{ __('models.name') }} :</th>
                                                            <td class="text-muted">{{ $user->name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">{{ __('models.email') }} :</th>
                                                            <td class="text-muted">{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">{{ __('models.countries') }} :</th>
                                                            <td class="text-muted"><span class="badge bg-secondary">{{ $user->country ? $user->country->name : ''}}</span>

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th class="ps-0" scope="row">{{ __('models.created_at') }}</th>
                                                            <td class="text-muted">{{ date('D, d M Y - h:ia', strtotime($user->created_at)) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->





                                    <!--end card-->


                                    <!--end card-->
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->
                        </div>


                    </div>
                    <!--end tab-content-->
                </div>
            </div>


            <div class="d-grid gap-2" >
                <a href="" class="btn btn-trans waves-effect waves-light btn-block add-input-value-color">{{ __('models.events') }}</a><br>
            </div>

              <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">


                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="event_user_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.count') }}</th>
                                    <th class="sort">{{ __('models.created_at') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">


                            </tbody>
                        </table>






                    </div>
            </div><!-- end card -->  <br><br><br>


            <div class="d-grid gap-2" >
                <a href="" class="btn btn-success waves-effect waves-light btn-block add-input-value-color">{{ __('models.parties') }}</a><br>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">

                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="parties_table">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort">{{ __('models.party_name') }}</th>
                                    <th class="sort">{{ __('models.img') }}</th>
                                    <th class="sort">{{ __('models.date') }}</th>
                                    <th class="sort">{{ __('models.time') }}</th>
                                    <th class="sort">{{ __('models.location') }}</th>
                                    <th class="sort" >{{ __('models.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">


                            </tbody>
                        </table>






                </div>
            </div><!-- end card -->


            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->




@endsection



@section('js')
    <script>
        var table =  $('#event_user_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: {
                url: "{{ route('admin.get-user-events') }}",
                type: "GET",
                data: {
                    user_id: {{ $user->id }}
                }
            },
            columns: [


                {
                    data : 'price' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data : 'count' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,


                {
                    data: 'created_at',
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                    searchable: false
                } ,





            ]
        });


    </script>

    <script>
        var table =  $('#parties_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: {
                url: "{{ route('admin.get-user-parties') }}",
                type: "GET",
                data: {
                    user_id: {{ $user->id }}
                }
            },
            columns: [

                {
                    data : 'name' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data: 'img',
                    render: function (data, type, full, meta) {
                        return '<img src="' + '{{ asset("storage/") }}' + '/' + data + '" alt="Image" class="me-3 rounded-circle avatar-md p-2 bg-light" >';
                    } ,
                    searchable: false,

                },


                {
                    data : 'date' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data : 'time' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data : 'location' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,



                {
                    data : 'action' ,
                    searchable: false,
                } ,



            ]
        });



    </script>
@endsection

