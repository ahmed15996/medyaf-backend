@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.users') }}
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
                        <div class="custom-controls m-1" style="background-color: #eee; padding: 5px; border-radius: 4px;">
                            <x-radio label="All" name="fliter_type" value="all"/>
                            <x-radio label="Email" name="fliter_type" value="email"/>
                            <x-radio label="Gmail" name="fliter_type" value="gmail"/>
                            <x-radio label="Apple" name="fliter_type" value="apple"/>
                        </div>

                        <div  class="custom-controls m-1" style="background-color: #eee; padding: 5px; border-radius: 4px;">
                            <x-radio label="{{ __('models.all') }}" name="fliter_active" value="all"/>
                            <x-radio label="{{ __('models.active') }}" name="fliter_active" value="0"/>
                            <x-radio label="{{ __('models.not_active') }}" name="fliter_active" value="1"/>
                        </div>

                        <x-select col="4" name="country_id" label="{{ __('models.countries') }}" :options="$countries->pluck('name' , 'id')" type=true/>

                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="user_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.users') }}</th>
                                    <th class="sort">{{ __('models.email') }}</th>
                                    <th class="sort">{{ __('models.countries') }}</th>
                                    <th class="sort">{{ __('models.user_type') }}</th>
                                    <th class="sort">{{ __('models.uid') }}</th>
                                    <th class="sort">{{ __('models.events') }}</th>
                                    <th class="sort">{{ __('models.is_active') }}</th>
                                    <th class="sort"></th>
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
        $(function() {
            $(document).on('change', '.is_active', function() {
                var is_active = $(this).prop('checked') ? 1 : 0;
                var id = $(this).data('id');
                console.log("is_active: " + is_active);
                console.log("ID: " + id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('admin.changeActiveUser') }}",
                    data: {
                        'is_active': is_active,
                        'id': id
                    },
                    success: function(data) {
                        alert(data.success);
                    }
                });
            });
        });
        var table =  $('#user_table').DataTable({
            processing     : true,
            serverSide     : true ,
            ordering       : false ,
            iDisplayLength : 10 ,
            lengthMenu     : [
                    [10 , 50 , 100 ,  -1] ,
                    [10 , 50 , 100 ,  'All'] ,
            ] ,
            ajax: "{{ route('admin.get-users') }}",
            columns: [


                {
                    data : 'name' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,



                {
                    data : 'email' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,


                {
                    data : 'country' ,
                    render: function (data, type, full, meta) {
                        return data;
                    },
                } ,

                {
                    data : 'type' ,
                    render: function (data, type, full, meta) {

                        if(data == 'email'){
                          return '<span class="badge bg-primary">'+data+'</span>' ;
                        }else if(data == 'gmail'){
                            return '<span class="badge bg-success">'+data+'</span>' ;
                        }else{
                            return '<span class="badge bg-info">'+data+'</span>' ;
                        }

                    },
                } ,

                {
                    data : 'uid' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data : 'event' ,
                    render: function (data, type, full, meta) {
                        return  data ;
                    },
                } ,

                {
                    data: 'is_active',
                    render: function (data, type, full, meta) {
                        var switchHtml = '<div class="form-check form-switch">' +
                            '<input class="form-check-input is_active" type="checkbox" name="is_active" data-id="'+full.id+'" id="switch_' + full.id + '" ' + (data == 1 ? 'checked' : '') + '>' +
                            '<label class="form-check-label" for="switch_' + full.id + '"></label>' +
                            '</div>';
                        return switchHtml;
                    },
                    searchable: false,
                },

                {
                    data: 'is_active',
                    visible: false,
                },


                {
                    data : 'action' ,
                    searchable: false,
                } ,






            ]
        });
        $('#country_id').change(function(){
            table.column(2).search($(this).val()).draw();
        });

        $('.fliter_type').on('change', function(e) {
            console.log($(this).val());
            if ($(this).val() == 'all') {
                table.search('').columns().search('').draw();

            } else if ($(this).val() == 'email') {
                    table.search('').columns(3).search('email').draw();
            } else if ($(this).val() == 'gmail') {
                table.search('').columns(3).search('gmail').draw();
            } else if ($(this).val() == 'apple') {
                table.search('').columns(3).search('apple').draw();
            }
        });

        $('.fliter_active').on('change', function(e) {
            console.log($(this).val());
            if ($(this).val() == 'all') {
                table.search('').columns().search('').draw();

            } else if ($(this).val() == '0') {
                    table.search('').columns(7).search('0').draw();
            } else if ($(this).val() == '1') {
                table.search('').columns(7).search('1').draw();
            }
        });


    </script>
@endsection
