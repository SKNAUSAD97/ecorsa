<section class="category-section-2">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Shop By Categories</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="category-slider arrow-slider">
                    @php 
                        $key = 1;
                    @endphp
                    @foreach ($subcategories as $c => $subcategory)
                    @php
                        if($key == 4){
                            $key = 1;
                        }
                        $key+= 1;
                    @endphp
                    <div>
                        <div class="shop-category-box border-0 wow fadeIn">
                            <a href="shop-left-sidebar.html" class="circle-{{($key)}}">
                                <img src="{{ url('/') }}/uploads/subcategory/{{ $subcategory->image }}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="category-name">
                                <h6>{{ $subcategory->subcategory_name }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>