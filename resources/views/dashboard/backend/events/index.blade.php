@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.events') }}
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"></h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">

                        <x-permission name="events-create">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('admin.events.create') }}" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i>{{ __('models.add_event') }}</a>
                                </div>
                            </div>
                        </x-permission>
                        <x-order-by name="created_id" label="{{ __('models.order_by') }}" :options="['asc' => 'الأقدم', 'desc' => 'الأحدث']" />
                        <x-order-by name="price" label="{{ __('models.price') }}"         :options="['asc' => 'الأقل', 'desc' => 'الأعلي']" />
                        <x-order-by name="count" label="{{ __('models.count') }}"         :options="['asc' => 'الأقل', 'desc' => 'الأكبر']" />
                        <x-order-by name="user_events" label="{{ __('models.package') }}" :options="['asc' => 'الاقل استخداما', 'desc' => 'الاكثر استخداما']" />

                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="event_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.count') }}</th>
                                    <th class="sort">{{ __('models.user_events') }}</th>
                                    <th class="sort">{{ __('models.created_at') }}</th>
                                    <th class="sort" >{{ __('models.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">


                            </tbody>
                        </table>







                    </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('js')
    <script>
        var table =  $('#event_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: {
                url: "{{ route('admin.get-events') }}",
                data: function(d) {
                    d.order_by = $('#created_id').val();
                    d.order_price = $('#price').val();
                    d.order_count = $('#count').val();
                    d.order_event = $('#user_events').val();
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
                    data : 'event_users' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                    searchable: false
                } ,

                {
                    data: 'created_at',
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                    searchable: false
                } ,

                {
                    data : 'action' ,
                    searchable: false,
                } ,



            ]
        });

        $('#created_id').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });

        $('#price').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });
        $('#count').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });
        $('#user_events').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });



    </script>
@endsection
