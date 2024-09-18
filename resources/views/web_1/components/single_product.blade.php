@foreach ($products as $key => $product)
<div>
    <div class="product-box product-white-bg wow fadeIn">
        <div class="product-image">
            <a href="product-left-thumbnail.html">
                <img src="{{ $product['image'] }}"
                    class="img-fluid blur-up lazyload" alt="">
            </a>
            <ul class="product-option">
                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                        <a href="javascript:void(0)" class="open-modal" data-bs-toggle="modal" data-id="{{ $product['id'] }}" data-bs-target="#view">
                            <i data-feather="eye"></i>
                        </a>
                </li>

                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                    <a href="compare.html">
                        <i data-feather="refresh-cw"></i>
                    </a>
                </li>

                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                    <a href="wishlist.html" class="notifi-wishlist">
                        <i data-feather="heart"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="product-detail position-relative">
            <a href="{{ route('product-single', $product['id']) }}">
                <h6 class="name">
                    {{ $product['name'] }}
                </h6>
            </a>

            <h6 class="sold weight text-content fw-normal">{{ $product['weight'] }}</h6>

            <h6 class="price theme-color">$ {{ $product['price'] }}</h6>
            @include('web/components/cart_button')
        </div>
    </div>
</div>
@endforeach
