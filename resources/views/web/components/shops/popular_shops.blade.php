<style>
    .btn-shop{
        padding: 5px 10px;
        font-size: 12px;
        font-weight: bold;
    }
</style>
<section>
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Popular Shops</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-4-1 ratio_65 no-arrow product-wrapper">
                    @foreach ($shops as $shop)
                    <div>
                        <div class="product-slider wow fadeInUp">
                            <a href="shop-left-sidebar.html" class="product-slider-image">
                                <img src="{{ url('/') }}/uploads/shop/{{ $shop->image }}" style="height: 200px;" class="w-100 blur-up lazyload rounded-3"
                                    alt="">
                            </a>

                            <div class="product-slider-detail">
                                <div>
                                    <a href="shop-left-sidebar.html" class="d-block">
                                        <h3 class="text-title">{{$shop->shop_name}}</h3>
                                    </a>
                                    <h5>{{ substr($shop->short_desc, 0, 25) }}</h5>
                                    <div class="product-rating">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span>(34)</span>
                                    </div>
                                    <h6>By <span class="theme-color">{{ $shop->owner_name }}</span></h6>
                                    <button 
                                        onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation product-button btn-shop">
                                        Shop Now 
                                        <i class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>