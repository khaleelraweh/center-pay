@extends('layouts.app')

@section('style')
    <style>
        .panel-group--style2 .panel-body {
            padding: 20px;
            color: #fff;
            background: inherit;
        }

        .panel-group--style2 .panel-heading {
            padding: 0;
            border-bottom: 0;
            border-radius: 0;
            background-color: inherit;
        }

        .prd-block_links-wrap-bg {
            background-color: inherit;
        }

        .prd-block_info-box,
        .prd-block .prd-block_qty .qty {
            background-color: inherit;
        }

        .tags-list li a {
            color: black;
            font-weight: bold;
            font-size: 14px;
        }

        .breadcrumbs li a {
            text-decoration: none;
        }

        .filter-row .row {
            justify-content: flex-start;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        {{-- for fast link of this content  --}}
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                    <li><a href="{{ route('frontend.card_category', $card_category->slug) }}">{{ $card_category->name }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <div class="container">

                <div class="page-title text-center">
                    <h1>{{ $card_category->name }}</< /h1>
                </div>



                <div class="row prd-block prd-block--prv-bottom">
                    <div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <div class="mb-2 js-prd-m-holder"></div>

                            {{-- image show --}}
                            <div class="prd-block_main-image">
                                <div class="prd-block_main-image-holder" id="prdMainImage">

                                    <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

                                        @foreach ($card_category->photos as $photo)
                                            <div data-value="Beige">
                                                <span class="prd-img">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('assets/card_categories/' . $photo->file_name) }}"
                                                        class="lazyload fade-up elzoom" alt="{{ $card_category->name }}"
                                                        data-zoom-image="{{ asset('assets/card_categories/' . $photo->file_name) }}" />
                                                </span>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="prd-block_label-sale-squared justify-content-center align-items-center">
                                        <span>Sale</span>
                                    </div>
                                </div>


                            </div>
                            {{-- image show temp  --}}
                            <div class="product-previews-wrapper">

                                <div class="product-previews-carousel js-product-previews-carousel">

                                    @foreach ($card_category->photos as $photo)
                                        <a href="#" data-value="Beige">
                                            <span class="prd-img">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/card_categories/' . $photo->file_name) }}"
                                                    class="lazyload fade-up" alt="" />
                                            </span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- cards of the above card category  --}}
                    <livewire:frontend.shop-cards-component :cards="$cards" />


                </div>
            </div>
        </div>



        {{-- card categories  --}}
        <div class="holder global_width">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style">قد يعجبك ايضا</h2>
                </div>
                <div class="prd-grid prd-promo-carousel data-to-show-4 js-prd-promo-carousel">

                    @forelse ($card_categories as $card_category)
                        <div class="prd-promo prd-promo--lg prd-has-loader">
                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{ route('frontend.card_category', $card_category->slug) }}"
                                        class="image-hover-scale">
                                        <img src="{{ asset('assets/card_categories/' . $card_category->firstMedia->file_name) }}"
                                            alt="{{ $card_category->name }}" class="js-prd-img" />
                                        <div class="prd-big-circle-labels">
                                            <div class="label-sale">
                                                <span>-false <span class="sale-text">Sale</span></span>
                                                <div class="countdown-circle">
                                                    <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="prd-info text-center">
                                    <h2 class="prd-title"><a href="product.html">{{ $card_category->name }}</a></h2>
                                    {{-- <div class="prd-rating">
              <i class="icon-star-fill fill"></i
              ><i class="icon-star-fill fill"></i
              ><i class="icon-star-fill fill"></i
              ><i class="icon-star-fill fill"></i
              ><i class="icon-star-fill fill"></i>
              <span></span>
            </div> --}}
                                    <div class="prd-hover">
                                        {{-- <div class="prd-price">
              <div class="price-old">$ 200</div>
              <div class="price-new">$ 180</div>
              </div> --}}
                                        <div class="prd-action">
                                            <button class="btn js-prd-addtocart" {{-- data-product='{"name": "بطائق الدفع", "path":"{{asset('frontend/images/games/cards/product-07-1.webp')}}", "url":"product.html", "aspect_ratio":0.778}' --}}>
                                                عرض الباقات
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse





                </div>
            </div>
        </div>


    </div>
@endsection
