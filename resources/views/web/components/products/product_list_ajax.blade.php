@foreach ($products as $key=> $product)
    <div>
        <div class="product-box-3 h-100 wow fadeInUp" style="box-shadow: 0 0 8px rgba(34, 34, 34, .08);background-color:#fff;">
            <div class="product-header">
                <div class="product-image">
                    <a href="product-left-thumbnail.html">
                        <img src="{{ url('/') }}/uploads/product/{{$product->image}}"
                            class="img-fluid blur-up lazyload" alt="">
                    </a>

                    <ul class="product-option">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#view">
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
            </div>
            <div class="product-footer">
                <div class="product-detail">
                    <span class="span-name">{{ $product->getSubcategories->subcategory_name }}</span>
                    <a href="product-left-thumbnail.html">
                        <h5 class="name" style="font-size:14px;">{{ substr($product->product_name, 0, 25) }}{{strlen($product->product_name) > 25 ? '...' : ''}}</h5>
                    </a>
                    <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                        Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                        cheese macaroni cheese croque monsieur.</p>
                    <div class="product-rating mt-2">
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
                        <span>(4.0)</span>
                    </div>
                    <h6 class="unit">250 ml</h6>
                    <h5 class="price">
                        <span style="font-size:14px;" class="theme-color">₹{{ $product->spl_price }}</span> 
                        <del style="font-size:14px;">₹{{ $product->price }}</del>
                    </h5>
                    <div class="add-to-cart-box">
                        <button class="btn btn-add-cart addcart-button">Add
                            <span class="add-icon bg-light-gray">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </button>
                        @php
                            $cart = session()->get('cart');
                            $quantity = 0;
                            if(isset($cart[$product['id']])){
                                $quantity = $cart[$product['id']]['quantity'];
                            }
                        @endphp
                        <div class="cart_qty qty-box">
                            <div class="input-group">
                                <button onclick="addToCart({{$product->id}}, 2)" type="button" class="qty-left-minus bg-gray"
                                    data-type="minus" data-field="">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input class="form-control input-number qty-input product-qty-{{$product['id']}}" type="text"
                                    name="quantity" value="{{ $quantity }}">
                                <button onclick="addToCart({{$product->id}})" type="button" class="qty-right-plus bg-gray"
                                    data-type="plus" data-field="">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach