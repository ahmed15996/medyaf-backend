@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.parties') }}
@endsection

@section('css')

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

                        <x-select col="4" name="user_id" label="{{ __('models.users') }}" :options="$users->pluck('name' , 'id')" type=true/>
                        <x-order-by col="4" name="created_id" label="{{ __('models.order_by') }}"  :options="['asc' => 'الأقدم', 'desc' => 'الأحدث']" />
                        <x-forms col="4"  name="date" value="" type="date" label="{{ __('models.date') }}"/>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="party_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.party_name') }}</th>
                                    <th class="sort">{{ __('models.img') }}</th>
                                    <th class="sort">{{ __('models.date') }}</th>
                                    <th class="sort">{{ __('models.time') }}</th>
                                    <th class="sort">{{ __('models.code') }}</th>
                                    <th class="sort">{{ __('models.owner') }}</th>
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

    <script src="{{ asset('dashboard/assets/js/custom-delete.js') }}"></script>

    <script>
        var table =  $('#party_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: {
                url: "{{ route('admin.get-parties') }}",
                data: function(d) {
                    d.order_by = $('#created_id').val();
                    d.date = $('#date').val();

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
                    data : 'code' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data : 'user' ,
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

        $('#user_id').change(function(){
            table.column(5).search($(this).val()).draw();
        });
        $('#created_id').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });
        $('#date').on('change', function(e) {
            console.log($(this).val());
            table.draw();
        });

    </script>
@endsection
