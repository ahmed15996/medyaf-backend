$(document).ready(function () {

    $(document).on('click', '.item-delete', function (e) {

        e.preventDefault();
        const Toast2 = Swal.mixin({

            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        const Toast = Swal.mixin({

            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: '#888',
            confirmButtonColor: '#d6210f',
            confirmButtonText: 'حذف',
            cancelButtonText: 'لا',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'question',
            title: 'هل تريد الحذف ؟'
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).data('id');
                var url = $(this).attr('href');
                var elem = $(this).closest('tr');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _method: 'delete',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                    },
                    dataType: 'json',
                    success: function (result) {
                        elem.fadeOut();


                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: "تم الحذف بنجاح"
                        })


                    } // end of success

                }); // end of ajax 

            } else if (result.dismiss === Swal.DismissReason.cancel) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: "تم الالغاء بنجاح"
                })

            } // end of else confirmed

        }) // end of then
    });

});