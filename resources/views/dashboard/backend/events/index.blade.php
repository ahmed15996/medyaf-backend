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

                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="event_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.count') }}</th>
                                    <th class="sort">{{ __('models.users') }}</th>
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
            ajax: "{{ route('admin.get-events') }}",
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
                    data : 'users' ,
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


    </script>
@endsection
