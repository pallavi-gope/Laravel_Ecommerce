<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cnt-home">
    @include('layouts.headerlayout')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        @yield('content')
    </div>
    @include('layouts.footerlayout')
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/echo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.easing-1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/scripts.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pname">Modal title</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-img">
                                    <img src="" id="pimage" class="img-responsive" alt="product image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: Rs. <strong id="pprice"></strong> <span id="oldprice" style="text-decoration: line-through;"></span></li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                                <li class="list-group-item">Stock: <span id="available" class="badge badge-pill"></span></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="colorarea">
                                <label for="">Choose Color</label>
                                <select name="color" id="color" class="form-control">
                                </select>
                            </div>
                            <div class="form-group" id="sizearea">
                                <label for="">Choose Size</label>
                                <select name="size" id="size" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" />
                            </div>
                            <input type="hidden" name="product_id" id="product_id" value="" />
                            <div class="form-group">
                                <button type="submit" onclick="addtocart()" name="addtocart" class="btn btn-block btn-primary"> <i class="fa fa-shopping-cart"></i> Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CART FUNCTIONALITY -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#pname').text(data.product.product_name_en);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pstock').text(data.product.product_qty);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);

                    $('#pprice').empty();
                    $('#oldprice').empty();
                    if (data.product.discount_price == null) {
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text('Rs.' + data.product.selling_price);
                    }

                    $('select[name="color"]').empty();
                    $('select[name="size"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                        if (data.color == "") {
                            $('#colorarea').hide();
                        } else {
                            $('#colorarea').show();
                        }
                    });
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                        if (data.size == "") {
                            $('#sizearea').hide();
                        } else {
                            $('#sizearea').show();
                        }
                    });
                    $('#available').removeClass('bg-success');
                    $('#available').removeClass('bg-danger');
                    if (data.product.product_qty > 0) {
                        $('#available').text('Available');
                        $('#available').addClass('bg-success');
                    } else {
                        $('#available').text('Stock Out');
                        $('#available').addClass('bg-danger');
                    }
                    $('#product_id').val(id);
                    $('#qty').val(1);
                }
            });
        }

        function addtocart() {
            var product_name = $('#pname').text();
            var product_id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    product_name: product_name,
                    product_id: product_id,
                    color: color,
                    size: size,
                    quantity: quantity
                },
                url: "/cart/data/store/" + product_id,
                success: function(data) {
                    minicart();
                    $('#close').click();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        });
                    }
                    //console.log(data);
                }
            });
        }

        function minicart() {
            $.ajax({
                type: 'GET',
                url: '/products/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);
                    var minicart = '';
                    $.each(response.carts, function(key, value) {
                        minicart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"><a href=""><img src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="">${value.name}</a></h3>
                                            <div class="price">Rs.${value.price} * ${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action"><button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>`;
                    });
                    $('#minicart').html(minicart)
                }
            });
        }
        minicart();

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    minicart();
                    cart();
                    couponCalc();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }
    </script>
    <!-- ADD TO WISHLIST FUNCTIONALITY -->
    <script type="text/javascript">
        function addToWishlist(product_id) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/user/add-to-wishlist/" + product_id,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }

        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist/view',
                dataType: 'json',
                success: function(response) {
                    var rows = '';
                    $.each(response, function(key, value) {
                        rows += ` <tr>
                                    <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image wishlist"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="product/${value.product_id}/${value.product.product_slug_en}">${value.product.product_name_en}</a></div>
                                        <div class="price">
                                        ${value.product.discount_price == null ? `Rs. ${value.product.selling_price}` : `Rs. ${value.product.discount_price} <span>Rs. ${value.product.selling_price}</span>` }                                            
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button class="btn btn-primary icon" data-toggle="modal" data-target="#cartModal" id="${value.product_id}" onclick="productView(this.id)" type="button"> <i class="fa fa-shopping-cart"></i>&nbsp;Add to Cart </button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="button" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`;
                    });
                    $('#wishlist').html(rows);
                }
            });
        }
        wishlist();

        function wishlistRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }
    </script>
    <!-- CART PAGE -->
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/cart/view',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
                                    <td class="col-md-2"><img src="/${value.options.image}" style="width:80px" alt="imga"></td>                                    
                                    <td class="col-md-4">
                                        <div class="product-name"><a href="#">${value.name}</a></div>                                        
                                        <div class="price">Rs. ${value.price} </div>
                                    </td>  
                                    <td class="col-md-2">
                                        <strong>${value.options.color}</strong>
                                    </td> 
                                    <td class="col-md-2">
                                       ${value.options.size == null ? `<span>...</span>` : `<strong>${value.options.size}</strong>`}
                                    </td> 
                                    <td class="col-md-2">
                                        <div class="flex">
                                            ${value.qty > 1 ? 
                                                `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                                : `<button type="submit" class="btn btn-danger btn-sm" disabled="">-</button>`
                                            }
                                            
                                            <input type="number" value="${value.qty}" min="1" max="200" disabled="" style="width:40px;text-align:center" />
                                            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                        </div>
                                    </td>  
                                    <td class="col-md-2" style="white-space:nowrap">
                                        <strong class="price">Rs. ${value.subtotal}</strong>
                                    </td>                          
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
                    });
                    $('#cartpage').html(rows);
                }
            })
        }
        cart();
        function cartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    minicart();
                    couponCalc();
                    $('#couponField').show();
                    $('#coupon_name').val('');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/increment/' + rowId,
                dataType: 'json',
                success: function(response) {
                    cart();
                    minicart();
                    couponCalc();
                }
            });
        }
        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/decrement/' + rowId,
                dataType: 'json',
                success: function(response) {
                    cart();
                    minicart();
                    couponCalc();
                }
            });
        }
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalc();
                    if(data.validity == true){
                        $('#couponField').hide();  
                    }                                  
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }
        function couponCalc() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            ` <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">Rs. ${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">Rs. ${data.total}</span>
                                    </div>
                                </th>
                            </tr>`
                        );
                    } else {
                        $('#couponCalField').html(
                            ` <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal <span class="inner-left-md">Rs. ${data.subtotal}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Coupon <span class="inner-left-md">${data.coupon_name}</span>
                                        <button type="submit" onclick="couponRemove()" style="border:none; background:transparent;margin-right:-30px;color:red"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="cart-sub-total">
                                        Discount <span class="inner-left-md">Rs. ${data.discount_amount}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">Rs. ${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`
                        );
                    }
                }
            });
        }
        couponCalc();
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalc();
                    $('#couponField').show();
                    $('#coupon_name').val('');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            });
        }
    </script>
</body>

</html>