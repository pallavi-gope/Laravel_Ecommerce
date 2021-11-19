//DELETE
$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//CONFIRM
$(function() {
    $(document).on('click', '#confirm', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Confirm Order?',
            text: "Once Confirm, You Will Not Be Able To Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Confirm!',
                    'Confirm Changes',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//PROCESSING
$(function() {
    $(document).on('click', '#process', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Processing Order?',
            text: "Once Processing, You Will Not Be Able To Confirm Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Processing!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Processing!',
                    'Processing Order',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//PICKED
$(function() {
    $(document).on('click', '#picked', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Picked Order?',
            text: "Once Picked, You Will Not Be Able To Processing Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Picked!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Picked!',
                    'Picked Order',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//SHIPPED
$(function() {
    $(document).on('click', '#shipped', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Shipped Order?',
            text: "Once Shipped, You Will Not Be Able To Picked Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Shipped!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Shipped!',
                    'Shipped Order',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//DELIVERED
$(function() {
    $(document).on('click', '#delivered', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Delivered Order?',
            text: "Once Delivered, You Will Not Be Able To Shipped Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delivered!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Delivered!',
                    'Delivered Order',
                    'success'
                )
                window.location = link;
            }
        });
    });
});
//CANCEL
$(function() {
    $(document).on('click', '#cancel', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are You Sure Want To Cancel Order?',
            text: "Once Cancel, You Will Not Be Able To Delivered Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Cancelled!',
                    'Cancelled Order',
                    'success'
                )
                window.location = link;
            }
        });
    });
});