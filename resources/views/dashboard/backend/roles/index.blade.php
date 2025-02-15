@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.roles') }}
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{ __('models.add_edit_remove') }}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">


                        <x-permission name="roles-create">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i>{{ __('models.add_role') }}</a>
                                </div>
                            </div>
                        </x-permission>



                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="role_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.roles') }}</th>
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
    <script src="{{ asset('dashboard/assets/js/custom-delete.js') }}"></script>

    <script>
        $('#role_table').DataTable({
        processing     : true,
        serverSide     : true ,
        ordering       : false ,
        iDisplayLength : 10 ,
        lengthMenu     : [
                 [10 , 50 , 100 ,  -1] ,
                 [10 , 50 , 100 ,  'All'] ,
        ] ,
        ajax: "{{ route('admin.get-roles') }}",
        columns: [


            {
                data : 'name' ,
                render: function (data, type, full, meta) {
                    return  data ;
                },
            } ,



            {
                data : 'created_at' ,
                render: function (data, type, full, meta) {
                    return '<span class="badge bg-info-subtle text-dark badge-border">' + data + '</span>';
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
