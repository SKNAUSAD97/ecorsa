<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Apr 2024 07:20:46 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{ url('/') }}/web/assets/images/favicon/6.png" type="image/x-icon">
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ url('/') }}/web/assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="{{ url('/') }}/web/assets/css/animate.min.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/web/assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/web/assets/css/vendors/animate.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ url('/') }}/web/assets/css/style.css">
</head>

<body class="theme-color-4 bg-gradient-color">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('web/components/header')
    <!-- Header End -->

    <!-- mobile fix menu start -->
    @include('web/components/mobile_menu')
    <!-- mobile fix menu end -->

    <!-- Product Section Start -->
    <section class="product-section pt-0">
        <div class="container-fluid p-0">
            <div class="custom-row">
                @include('web/components/catagory_sidebar')
                @yield('content')
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Start -->
    @include('web/components/footer')
    <!-- Footer Section End -->

    <!-- Quick View Modal Box Start -->
    @include('web/components/product_quickview')
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    @include('web/components/location_selection')
    <!-- Location Modal End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ url('/') }}/web/assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ url('/') }}/web/assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ url('/') }}/web/assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ url('/') }}/web/assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top and theme setting button start -->
    @include('web/components/up_button')
    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{ url('/') }}/web/assets/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="{{ url('/') }}/web/assets/js/jquery-ui.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ url('/') }}/web/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/web/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="{{ url('/') }}/web/assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="{{ url('/') }}/web/assets/js/feather/feather.min.js"></script>
    <script src="{{ url('/') }}/web/assets/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="{{ url('/') }}/web/assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="{{ url('/') }}/web/assets/js/slick/slick.js"></script>
    <script src="{{ url('/') }}/web/assets/js/slick/slick-animation.min.js"></script>
    <script src="{{ url('/') }}/web/assets/js/slick/custom_slick.js"></script>

    <!-- Auto Height Js -->
    <script src="{{ url('/') }}/web/assets/js/auto-height.js"></script>

    <!-- Fly Cart Js -->
    <script src="{{ url('/') }}/web/assets/js/fly-cart.js"></script>

    <!-- Quantity js -->
    <script src="{{ url('/') }}/web/assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="{{ url('/') }}/web/assets/js/wow.min.js"></script>
    <script src="{{ url('/') }}/web/assets/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="{{ url('/') }}/web/assets/js/script.js"></script>

    <!-- theme setting js -->
    {{-- <script src="{{ url('/') }}/web/assets/js/theme-setting.js"></script> --}}

    <script>
        $('.open-modal').click(function () { 
            const productId = this.getAttribute('data-id');
            fetch(`/get-single-product/${productId}`)
            .then(response => response.text())
            .then(html => {
                $('.modal-body').html(html);
                // Show the modal
                $('#view').modal('show');
            })
            .catch(error => console.error('Error:', error));
        });

        addToCart = (id, type=1) =>{
            fetch(`/add-to-cart/${id}?type=${type}`)
            .then(response => response.text())
            .then(data => {
                const response = JSON.parse(data);
                snackbar(response.message, 'info');
                // setTimeout(() => {
                //     $(`.cart-box-${id}`).removeClass('open');
                // }, 5000);
            })
            .catch(error => console.error('Error:', error));
        }

        updateRowColumn = (column) =>{
            $('.products-row').removeClass('row-cols-xxl-3')
            $('.products-row').removeClass('row-cols-xxl-4')
            $('.products-row').removeClass('row-cols-xxl-5')
            $('.products-row').removeClass('row-cols-xxl-6')
            $('.products-row').addClass('row-cols-xxl-' + column)
        }

        snackbar = (message, type) =>{
            $.notify({
                icon: "fa fa-check",
                title: "",
                message: message,
            }, {
                element: "body",
                position: null,
                type: type,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right",
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 3000,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp",
                },
                icon_type: "class",
                template: '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    "</div>" +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    "</div>",
            });
        }
    </script>
</body>
</html>
