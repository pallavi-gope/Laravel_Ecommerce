<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">
    <title>Easy Shop Admin - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@if(Session::has('light-skin'))

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    @else

    <body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
        @endif
        <div class="wrapper">
            @include('admin.layout.header')
            @include('admin.layout.sidebar')
            <div class="content-wrapper">
                @yield('admin')
            </div>
            @include('admin.layout.footer')
            <div class="control-sidebar-bg"></div>
        </div>
        <script type="text/javascript" src="{{ asset('backend/js/vendors.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/template.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/pages/data-table.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
        <!--CKEDITOR -->
        <script type="text/javascript" src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/pages/editor.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
                case 'danger':
                    toastr.danger("{{ Session::get('message') }}");
                    break;
            }
        </script>
        @endif
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="{{ asset('backend/js/script.js') }}"></script>
        <script type="text/javascript">
            function changeColor() {
                if ($('body').hasClass('dark-skin')) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: "{{ url('/set-light-skin') }}",
                        success: function(data) {
                            $('#colortoggler').text('Dark Mode');
                            location.reload();
                        }
                    });
                } else {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: "{{ url('/set-dark-skin') }}",
                        success: function(data) {
                            $('#colortoggler').text('Light Mode');
                            location.reload();
                        }
                    });
                }
            }
        </script>
    </body>

</html>