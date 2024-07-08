<x-order-by name="created_id" label="{{ __('models.order_by') }}"  :options="['asc' => 'الأقدم', 'desc' => 'الأحدث']" />


ajax: {
    url: "{{ route('admin.get-users') }}",
    data: function(d) {
        d.order_by = $('#created_id').val();
    }
},



$('#created_id').on('change', function(e) {
    console.log($(this).val());
    table.draw();
});



use Illuminate\Http\Request;
Request $request
orderById($request , $users);
