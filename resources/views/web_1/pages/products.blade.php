@extends('web/components/layout')
@section('content')
<div class="content-col">
    <div class="section-b-space">
        {{-- Shop Sections Starts --}}
        <!-- Breadcrumb Section Start -->
        <section class="breadcrumb-section pt-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-contain">
                            <h2>Product By Category</h2>
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Vegetables And Fruit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
        <section class="section-b-space shop-section">
            <div class="row">
                <div class="col-12">
                    <div class="show-button">
                        <div class="top-filter-menu-2">
                            <div class="sidebar-filter-menu" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample">
                                <a href="javascript:void(0)"><i class="fa-solid fa-filter"></i> Filter Menu</a>
                            </div>

                            <div class="ms-auto d-flex align-items-center">
                                <div class="category-dropdown me-md-3">
                                    <h5 class="text-content">Sort By :</h5>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown">
                                            <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" id="pop"
                                                    href="javascript:void(0)">Popularity</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="rating" href="javascript:void(0)">Average
                                                    Rating</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z
                                                    Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A
                                                    Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="off" href="javascript:void(0)">% Off -
                                                    Hight To
                                                    Low</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="grid-option grid-option-2">
                                    <ul>
                                        <li class="three-grid" onclick="updateRowColumn(3)">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn five-grid d-xxl-inline-block d-none" onclick="updateRowColumn(4)">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-4.svg"
                                                    class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            </a>
                                        </li>
                                        <li class="five-grid d-xxl-inline-block d-none active" onclick="updateRowColumn(5)">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-5.svg"
                                                    class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-filter-category" id="collapseExample">
                        <div class="row g-sm-4 g-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Pack Size</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="fruit">
                                            <label class="form-check-label" for="fruit">
                                                <span class="name">Fruits & Vegetables</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="cake">
                                            <label class="form-check-label" for="cake">
                                                <span class="name">Bakery, Cake & Dairy</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="behe">
                                            <label class="form-check-label" for="behe">
                                                <span class="name">Beverages</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="snacks">
                                            <label class="form-check-label" for="snacks">
                                                <span class="name">Snacks & Branded Foods</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="beauty">
                                            <label class="form-check-label" for="beauty">
                                                <span class="name">Beauty & Household</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="pets">
                                            <label class="form-check-label" for="pets">
                                                <span class="name">Kitchen, Garden & Pets</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="egg">
                                            <label class="form-check-label" for="egg">
                                                <span class="name">Eggs, Meat & Fish</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="food">
                                            <label class="form-check-label" for="food">
                                                <span class="name">Gourment & World Food</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="care">
                                            <label class="form-check-label" for="care">
                                                <span class="name">Baby Care</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="fish">
                                            <label class="form-check-label" for="fish">
                                                <span class="name">Fish & Seafood</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="marinades">
                                            <label class="form-check-label" for="marinades">
                                                <span class="name">Marinades</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="lamb">
                                            <label class="form-check-label" for="lamb">
                                                <span class="name">Mutton & Lamb</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="other">
                                            <label class="form-check-label" for="other">
                                                <span class="name">Port & other Meats</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="pour">
                                            <label class="form-check-label" for="pour">
                                                <span class="name">Pourltry</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="salami">
                                            <label class="form-check-label" for="salami">
                                                <span class="name">Sausages, bacon & Salami</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Price</h3>
                                </div>
                                <div class="range-slider">
                                    <input type="text" class="js-range-slider" value="">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Discount</h3>
                                </div>
                                <ul class="category-list">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <span class="name">upto 5%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault1">
                                                <span class="name">5% - 10%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault2">
                                            <label class="form-check-label" for="flexCheckDefault2">
                                                <span class="name">10% - 15%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault3">
                                            <label class="form-check-label" for="flexCheckDefault3">
                                                <span class="name">15% - 25%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault4">
                                            <label class="form-check-label" for="flexCheckDefault4">
                                                <span class="name">More than 25%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Category</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault5">
                                            <label class="form-check-label" for="flexCheckDefault5">
                                                <span class="name">400 to 500 g</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault6">
                                            <label class="form-check-label" for="flexCheckDefault6">
                                                <span class="name">500 to 700 g</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault7">
                                            <label class="form-check-label" for="flexCheckDefault7">
                                                <span class="name">700 to 1 kg</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault8">
                                            <label class="form-check-label" for="flexCheckDefault8">
                                                <span class="name">120 - 150 g each Vacuum 2 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault9">
                                            <label class="form-check-label" for="flexCheckDefault9">
                                                <span class="name">1 pc</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault10">
                                            <label class="form-check-label" for="flexCheckDefault10">
                                                <span class="name">1 to 1.2 kg</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault11">
                                            <label class="form-check-label" for="flexCheckDefault11">
                                                <span class="name">2 x 24 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault12">
                                            <label class="form-check-label" for="flexCheckDefault12">
                                                <span class="name">2x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault13">
                                            <label class="form-check-label" for="flexCheckDefault13">
                                                <span class="name">4x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault14">
                                            <label class="form-check-label" for="flexCheckDefault14">
                                                <span class="name">5x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault15">
                                            <label class="form-check-label" for="flexCheckDefault15">
                                                <span class="name">Combo 2 Items</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault16">
                                            <label class="form-check-label" for="flexCheckDefault16">
                                                <span class="name">Combo 3 Items</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault17">
                                            <label class="form-check-label" for="flexCheckDefault17">
                                                <span class="name">2 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault18">
                                            <label class="form-check-label" for="flexCheckDefault18">
                                                <span class="name">3 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault19">
                                            <label class="form-check-label" for="flexCheckDefault19">
                                                <span class="name">2 pcs Vacuum (140 g to 180 g each
                                                    )</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault20">
                                            <label class="form-check-label" for="flexCheckDefault20">
                                                <span class="name">4 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault21">
                                            <label class="form-check-label" for="flexCheckDefault21">
                                                <span class="name">4 pcs Vacuum (140 g to 180 g each
                                                    )</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault22">
                                            <label class="form-check-label" for="flexCheckDefault22">
                                                <span class="name">6 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault23">
                                            <label class="form-check-label" for="flexCheckDefault23">
                                                <span class="name">6 pcs carton</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault24">
                                            <label class="form-check-label" for="flexCheckDefault24">
                                                <span class="name">6 pcs Pouch</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @include('web/components/product_list')
                    
                    <nav class="custom-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection