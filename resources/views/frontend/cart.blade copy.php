@extends('layouts.app')
@section('style')
    <style>
        .footer-shop-info,
        .footer-shop-info .row,
        .panel-heading {
            /* background: #23232D !important; */
            background: #1E171B !important;
        }

        .qty-changer button,
        .qty-changer input[type='number'],
        .qty-changer input[type='text'] {
            background-color: transparent;
        }

        .quantity-choice {
            /* width: 100px; */
            border: 1px solid #ecedf6 !important;
            border-radius: 22.5px;
            color: #fff !important;
            font-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0 10px;
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                <li><span>السلة</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1> سلة التسوق</h1>
            </div>


            <div class="row">

                <div class="col-md-8 js-hide-empty">

                    {{-- عناصر سلة التسوق  --}}
                    @forelse (Cart::content() as $item)
                        {{--  show item in cart using livewire --}}
                        @livewire('frontend.cart-item-component', ['itemRowId' => $item->rowId])

                        <div class="text-center mt-1"><a href="#"
                                class="btn btn--grey js-remove-all-product rounded-pill">الغاء
                                السلة</a>
                        </div>

                    @empty

                        {{-- سلة الشراء فارغة  --}}
                        <div class="cart">
                            <div class="card-body bg-transparent">
                                <div class="minicart-empty-text text-center">
                                    <h1>سلة الشراء فارغة</h1>
                                </div>
                                <div class="minicart-empty-icon">
                                    <i class="icon-shopping-bag"></i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;"
                                        xml:space="preserve">
                                        <path class="st0"
                                            d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforelse



                    {{-- random cards --}}
                    {{-- <livewire:frontend.random-card-component :random_cards="$random_cards" /> --}}

                    {{-- wanted more section  --}}
                    <div class="d-none d-lg-block">
                        <div class="mt-4"></div>
                        <div class="holder">
                            <div class="container">
                                <div class="title-wrap text-center">
                                    <h2 class="h1-style">قد يعجبك ايضا</h2>
                                    <div class="carousel-arrows carousel-arrows--center"></div>
                                </div>
                                {{-- may want more   --}}
                                <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                                    data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/1.webp') }}"
                                                        alt="Midi Dress" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                    <div
                                                        class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                                                        <i class="icon-palette"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span><span class="path9"></span><span
                                                                class="path10"></span></i>
                                                        <ul>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-grey.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-green.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-black.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/1.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/1.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">Seiko</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Midi Dress</a>
                                                    </h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Midi Dress", "path":"{{ asset('frontend/images/temp/1.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>استعراض سريع</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Midi Dress", "path":"{{ asset('frontend/images/temp/1.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                        alt="Stand Collar Shirt" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        <div class="label-sale"><span>-10% <span
                                                                    class="sale-text">Sale</span></span>
                                                            <div class="countdown-circle">
                                                                <div class="countdown js-countdown"
                                                                    data-countdown="2021/07/01"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Stand Collar
                                                            Shirt</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Stand Collar Shirt", "path":"{{ asset('frontend/images/temp/2.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>QUICK
                                                                    VIEW</span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-old">$ 200</div>
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Stand Collar Shirt", "path":"{{ asset('frontend/images/temp/2.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                        alt="Genuine Leather" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        <div class="label-new"><span>جديد</span></div>
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Genuine
                                                            Leather</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Genuine Leather", "path":"{{ asset('frontend/images/temp/3.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>Add
                                                                To Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>QUICK
                                                                    VIEW</span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Genuine Leather", "path":"{{ asset('frontend/images/temp/3.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>Add
                                                                    To Cart</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                        alt="Pureboost Shoes" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/4.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/4.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/5.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Pureboost
                                                            Shoes</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Pureboost Shoes", "path":"{{ asset('frontend/images/temp/4.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>إستعراض سريع</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Pureboost Shoes", "path":"{{ asset('frontend/images/temp/4.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- product one  --}}
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                        alt="Multiple Pocket" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/5.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/6.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/6.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/7.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/7.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Multiple
                                                            Pocket</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Multiple Pocket", "path":"{{ asset('frontend/images/temp/5.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>إستعراض سريع
                                                                </span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Multiple Pocket", "path":"{{ asset('frontend/images/temp/5.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mt-3 mt-md-0 js-hide-empty">

                    <div class="text-center">
                        <h2>الإجمالي</h2>
                    </div>

                    {{-- call to card total panel --}}
                    @livewire('frontend.cart-total-component')

                </div>



            </div>



        </div>
    </div>

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-trolley"></i>
                        </div>
                        <div class="text">
                            <h4>تسليم سريع للغاية</h4>
                            <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-currency"></i>
                        </div>
                        <div class="text">
                            <h4>افضل سعر</h4>
                            <p>
                                سنقوم بمطابقة أسعار المنتجات الرئيسية عبر الإنترنت والمحلية
                                المنافسين على الفور
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-diplom"></i>
                        </div>
                        <div class="text">
                            <h4>يضمن</h4>
                            <p>
                                إذا كان العنصر الذي تريده متاحًا، فيمكننا معالجة عملية الإرجاع
                                ووضع طلب جديد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
