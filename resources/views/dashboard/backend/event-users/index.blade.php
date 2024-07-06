@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.event_users') }}
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
                        <x-select col="6" name="user_id" label="{{ __('models.users') }}" :options="$users->pluck('name' , 'id')" type=true/>



                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="event_users_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.users') }}</th>
                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.count') }}</th>
                                    <th class="sort">{{ __('models.created_at') }}</th>
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
        var table =  $('#event_users_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: "{{ route('admin.get-event-users') }}",
            columns: [

                {
                    data : 'user' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

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

        $('#user_id').change(function(){
            table.column(0).search($(this).val()).draw();
        });

        $('#event_id').change(function(){
            table.column(1).search($(this).val()).draw();
        });


    </script>
@endsection
