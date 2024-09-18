<div class="add-to-cart-btn-2 addtocart_btn">
    <button class="btn addcart-button btn buy-button">
        <i class="fa-solid fa-plus"></i>
    </button>
    <div class="cart_qty qty-box-2 qty-box-3 cart-box-{{ $product['id'] }}">
        <div class="input-group">
            <button type="button" class="qty-left-minus" data-type="minus"
                data-field="" onclick="addToCart({{ $product['id'] }}, 2)">
                <i class="fa fa-minus"></i>
            </button>
            @php
                $cart = session()->get('cart');
                $quantity = 0;
                if(isset($cart[$product['id']])){
                    $quantity = $cart[$product['id']]['quantity'];
                }
            @endphp
            <input class="form-control input-number qty-input product-qty-{{$product['id']}}" type="text"
                name="quantity" value="{{ $quantity }}">
            <button type="button" class="qty-right-plus" data-type="plus"
                data-field="" onclick="addToCart({{ $product['id'] }})">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>