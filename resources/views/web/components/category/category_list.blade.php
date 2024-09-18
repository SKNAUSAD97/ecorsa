<div class="container-fluid-lg">
    <div class="row">
        <div class="col-12">
            <div class="header-nav">
                <div class="header-nav-left">
                    <button class="dropdown-category">
                        <i data-feather="align-left"></i>
                        <span>All Categories</span>
                    </button>

                    <div class="category-dropdown">
                        <div class="category-title">
                            <h5>Categories</h5>
                            <button type="button" class="btn p-0 close-button text-content">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <ul class="category-list">
                            @foreach ($categories as $k => $category)
                            @if($k < 8)
                                <li class="onhover-category-list">
                                    <a href="{{ route('products') }}?category={{ $category->id }}" class="category-name">
                                        <img src="{{ url('/') }}/uploads/category/{{$category->image}}" alt="">
                                        <h6>{{ substr($category->category_name, 0, 22) }}</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>

                                    <div class="onhover-category-box w-100">
                                        <div class="list-1">
                                            <div class="category-title-box">
                                                <h5>{{ $category->category_name }}</h5>
                                            </div>
                                            <ul>
                                                @foreach ($category->getSubcategories as $subk => $subcat)
                                                    <li>
                                                        <a href="{{ route('products') }}?subcategory={{ $subcat->id }}">{{$subcat->subcategory_name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="header-nav-middle">
                    <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                        <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                            <div class="offcanvas-header navbar-shadow">
                                <h5>Menu</h5>
                                <button class="btn-close lead" type="button"
                                    data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav">
                                    @foreach ($categories as $k=>$category)
                                    @if ($k < 7)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('/') }}">{{$category->category_name}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-nav-right">
                    <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                        <i data-feather="zap"></i>
                        <span>Deal Today</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>