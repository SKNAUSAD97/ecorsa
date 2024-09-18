@extends('web/components/layout')
@section('content')
<div class="content-col">
    <div class="section-b-space">
        <div class="row g-md-4 g-3">
            <div class="col-xxl-8 col-xl-12 col-md-7">
                <div class="banner-contain hover-effect">
                    <img src="{{ url('/') }}/web/assets/images/grocery/banner/11.jpg" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-sm-5 p-4">
                        <div>
                            <h2 class="text-kaushan fw-normal orange-color">Get Ready To</h2>
                            <h3 class="mt-2 mb-3 text-white">TAKE ON THE DAY!</h3>
                            <p class="text-content banner-text text-white opacity-75 d-md-block d-none">
                                In publishing and graphic design, Lorem ipsum is a placeholder text
                                commonly used to demonstrate.</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                    class="fa-solid fa-arrow-right icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-12 col-md-5">
                <div class="banner-contain hover-effect h-100">
                    <img src="{{ url('/') }}/web/assets/images/grocery/banner/12.jpg" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-4 h-100">
                        <div>
                            <h2 class="text-kaushan fw-normal orange-color">Organic</h2>
                            <h3 class="mt-2 mb-3">Fresh</h3>
                            <p class="text-content banner-text w-100">Super Offer to 50%
                                Off</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                    class="fa-solid fa-arrow-right icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="title d-block">
        <h2 class="text-theme font-sm">Food Cupboard</h2>
        <p>A virtual assistant collects the products from your list</p>
    </div>

    @include('web/components/product_list')

    <div class="title d-block">
        <h2 class="text-theme font-sm">Food Cupboard</h2>
        <p>A virtual assistant collects the products from your list</p>
    </div>

    @include('web/components/product_list')
</div>
@endsection