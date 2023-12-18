@extends('layouts.app')


@section('content')
    {{-- Main slider part  --}}
    <div class="holder fullwidth fullwidth mt-0 full-nopad">
        <div class="container">


            <div class="bnslider-wrapper">
                <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": false}'
                    data-autoplay="true" data-speed="5000" data-start-width="1920" data-start-height="880"
                    data-start-mwidth="1550" data-start-mheight="1000">

                    @forelse ($main_sliders as $main_slider)
                        @if ($loop->first)
                            {{-- slider slid  --}}
                            <div class="bnslider-slide">
                                {{-- for desktop --}}
                                <div class="bnslider-image-mobile lazyload fade-up"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}">
                                </div>

                                {{-- for mobile --}}
                                <div class="bnslider-image-mobile lazyload bnslider-lightning bnslider-flashit"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}"
                                    style="opacity: 0"></div>

                                <div class="bnslider-image lazyload fade-up"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}">
                                </div>

                                <div class="bnslider-image lazyload bnslider-lightning bnslider-flashit"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}"
                                    style="opacity: 0"></div>

                                <div class="bnslider-text-wrap bnslider-overlay">
                                    <div class="bnslider-text-content txt-middle txt-center">
                                        <div class="bnslider-text-content-flex">
                                            <div class="bnslider-vert w-s-60 w-ms-100">
                                                <div class="bnslider-text order-1 mt-sm bnslider-text--xl text-center heading-font"
                                                    data-animation="fadeInUp" data-animation-delay="500"
                                                    data-fontcolor="#fff" data-fontweight="900">
                                                    {{ $main_slider->title }}

                                                </div>
                                                <div class="bnslider-text order-2 mt-sm bnslider-text--sm text-center heading-font"
                                                    data-animation="fadeInUp" data-animation-delay="1000"
                                                    data-fontcolor="#fff" data-fontweight="900">
                                                    {!! $main_slider->content !!}
                                                </div>
                                                <div class="btn-wrap text-center order-3 mt-lg" data-animation="fadeIn"
                                                    data-animation-delay="2000" style="opacity: 1">
                                                    <a href="../../../https@bit.ly/3iLAAEp"
                                                        class="btn btn--invert btn--lg">تسوق الان</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- slider slid  --}}
                            <div class="bnslider-slide">
                                <div class="bnslider-image-mobile lazyload"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}">
                                </div>

                                <div class="bnslider-image lazyload"
                                    data-bgset="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}">
                                </div>

                                <div class="bnslider-text-wrap bnslider-overlay">
                                    <div class="bnslider-text-content txt-middle txt-center">
                                        <div class="bnslider-text-content-flex">
                                            <div class="bnslider-vert w-s-60 w-ms-100">
                                                <div class="bnslider-text order-1 mt-sm bnslider-text--xl text-center heading-font"
                                                    data-animation="fadeInUp" data-animation-delay="500"
                                                    data-fontcolor="#fff" data-fontweight="900">
                                                    {{ $main_slider->title }}
                                                </div>
                                                <div class="bnslider-text order-2 mt-sm bnslider-text--sm text-center heading-font"
                                                    data-animation="fadeInUp" data-animation-delay="1000"
                                                    data-fontcolor="#fff" data-fontweight="900">
                                                    {!! $main_slider->content !!}
                                                </div>
                                                <div class="btn-wrap text-center order-3 mt-lg" data-animation="fadeIn"
                                                    data-animation-delay="2000" style="opacity: 1">
                                                    <a href="../../../https@bit.ly/3iLAAEp"
                                                        class="btn btn--invert btn--lg">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                    @endforelse


                </div>
                <div class="bnslider-arrows container-fluid">
                    <div></div>
                </div>
                <div class="bnslider-dots container-fluid"></div>
            </div>

        </div>

    </div>

    {{-- Advertisor menu --}}
    <div class="holder mt-0">
        <div class="container-fluid px-0">
            <div class="row bnr-grid no-gutters">

                @forelse ($adv_sliders as $adv_slider)
                    <div class="col-12 col-sm-4">
                        <div class="bnr-wrap d-flex align-items-center h-100 bnr-1586628920521-0">
                            <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--middle bnr--center"
                                data-fontratio="5.9">
                                <div class="bnr-img image-container" style="padding-bottom: 38.933%">
                                    <img data
                                        srcset="{{ asset('assets/advertisor_sliders/' . $adv_slider->firstMedia?->file_name) }}"
                                        class="lazyload fade-up" alt="" />
                                </div>
                                <div class="bnr-caption" style="padding: 4% 4%; width: 100%">
                                    <div class="bnr-text3 mt-0 order-1"
                                        style="
                      font-size: 0.20em;
                      font-weight: 700;
                      line-height: 1em;
                      letter-spacing: 3px;
                    ">

                                        {{ $adv_slider->published_on->format('Y') }}
                                    </div>
                                    <div class="bnr-text3 mt-xs order-2"
                                        style="
                      font-size: 0.4em;
                      font-weight: 800;
                      line-height: 1em;
                    ">
                                        {{ $adv_slider->title }}
                                    </div>
                                    <div class="bnr-text3 mt-xs order-2"
                                        style="
                      font-size: 0.2em;
                      font-weight: 500;
                      line-height: 1em;
                    ">
                                        {!! $adv_slider->content !!}
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

    {{-- featured cards livewire component --}}
    <livewire:frontend.home.featured-card-component />

    {{-- random cards --}}
    <livewire:frontend.home.random-card-component :random_cards="$random_cards" />

    {{-- card categories  --}}
    <div class="holder global_width">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">اختر البطاقة المناسبة لك</h2>
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
                                <h2 class="prd-title"><a
                                        href="{{ route('frontend.card_category', $card_category->slug) }}">{{ $card_category->name }}</a>
                                </h2>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <a href="{{ route('frontend.card_category', $card_category->slug) }}"
                                            class="btn js-prd-addtocart">
                                            عرض الباقات
                                        </a>
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

    {{--  cards news --}}
    <div class="holder holder-mt-medium">
        <div class="container">
            <div class="title-with-arrows">
                <h2 class="h1-style">
                    <a href="blog.html" title="View all">أخر اخبار الألعاب</a>
                </h2>
                <div class="carousel-arrows"></div>
            </div>
            <div class="post-prws post-prws-carousel post-prws-carousel--single js-post-prws-carousel"
                data-slick='{"slidesToShow": 2, "responsive": [{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>

                @forelse ($news as $newsItem)
                    <div class="post-prw">
                        <div class="row vert-margin-middle">
                            <div class="post-prw-img col-sm-6">
                                <a href="blog-post.html" class="d-block image-container" style="padding-bottom: 88.92%">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/news/' . $newsItem->firstMedia?->file_name) }}"
                                        class="lazyload fade-up" alt="Blog Title" />
                                </a>
                            </div>
                            <div class="post-prw-text col-sm-6">
                                <h4 class="post-prw-title">
                                    <a href="#"> {{ $newsItem->name }} </a>
                                </h4>
                                <div class="post-prw-links">
                                    <div class="post-prw-date">
                                        <i class="icon-calendar1"></i><span>{{ $newsItem->published_on }}</span>
                                    </div>
                                </div>
                                <div class="post-prw-teaser">
                                    {!! $newsItem->description !!}
                                </div>
                                <div class="post-prw-btn">
                                    <a href="#" class="btn btn--md">اقرأ المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>

    {{-- common question --}}
    <div class="holder holder-subscribe-full mt-0" id="questions" style="background-color: transparent">
        <div class="container">
            <div class="title-wrap text-center">
                <h3 class="h2-style testimonials-carousel-simple-name">الإستفسارات</h3>
                <h2 class="h1-style">الاسئلة الشائعة</h2>
            </div>
            <div class="row p-5">
                <div class="col-md-12">
                    <div class="wrapper center-block">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            @forelse ($common_questions as $question)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="{{ $question->id }}">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse{{ $question->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                                {{ $question->title }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $question->id }}" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="{{ $question->id }}">
                                        <div class="panel-body">
                                            {!! $question->content !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- get discount by create account --}}
    {{-- <div class="holder holder-subscribe-full mt-0" style="background-color: transparent">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="subscribe-form-title-md">
                        احصل على <span class="custom-color">20%</span> تخفيض
                    </div>
                    <div class="subscribe-form-title-sm">اشترك الآن!</div>
                </div>
                <div class="col">
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="form-inline">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="ادخل الايميل..." />
                                    <svg preserveAspectRatio="none">
                                        <rect x="2" y="2" rx="6" height="100%" width="100%"></rect>
                                    </svg>
                                    <span class="bottom"></span>
                                </div>
                                <button type="submit" class="btn btn--lg">اشترك</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- info --}}
    {{-- <div class="holder mt-0">
        <div class="container">
            <div class="text-icn-blocks-row text-icn-blocks-row--nodivider justify-content-center">
                <div class="text-icn-block-hor">
                    <div class="icn" style="color: #63555e">
                        <i class="icon-speech-bubble"></i>
                    </div>
                    <div class="text">
                        <h4>We HAVE A CHAT!</h4>
                        <p>
                            +8 800 555 35 35<br />
                            +8 800 555 35 35
                        </p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn" style="color: #63555e">
                        <i class="icon-location"></i>
                    </div>
                    <div class="text">
                        <h4>OUR LOCATION</h4>
                        <p>
                            181 Arple Rd E, St Albans<br />
                            Swites 3021, USA
                        </p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn" style="color: #63555e">
                        <i class="icon-watch"></i>
                    </div>
                    <div class="text">
                        <h4>TIME WORK</h4>
                        <p>
                            5 Days a week<br />
                            from 08 AM to 8 PM
                        </p>
                    </div>
                </div>
                <div class="text-icn-block-hor">
                    <div class="icn" style="color: #63555e">
                        <i class="icon-credit-card-1"></i>
                    </div>
                    <div class="text">
                        <h4>100%% SECURE</h4>
                        <p>Faster & More Secure Online Gaming Payments</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="holder mt-0">
        <div class="container">
            <div class="text-icn-blocks-row text-icn-blocks-row--nodivider justify-content-center">
                <div class="col-md-3 text-icn-block-hor">
                    <div class="icn testimonials-carousel-simple-name" style="color: #dc3c01">
                        <i class="icon-tag "></i>
                    </div>
                    <div class="text">
                        <h4>أسعارنا الأفضل</h4>
                    </div>
                </div>
                <div class="col-md-3 text-icn-block-hor">
                    <div class="icn" style="color: #dc3c01">
                        <i class="icon-shopping"></i>
                    </div>
                    <div class="text">
                        <h4>عروضنا الأقوى</h4>
                    </div>
                </div>
                <div class="col-md-3 text-icn-block-hor">
                    <div class="icn" style="color: #dc3c01">
                        <i class="icon-call-center"></i>
                    </div>
                    <div class="text">
                        <h4>خدمة عملاء متميزة</h4>
                    </div>
                </div>
                <div class="col-md-3 text-icn-block-hor">
                    <div class="icn" style="color: #dc3c01">
                        <i class="icon-shopping-1"></i>
                    </div>
                    <div class="text">
                        <h4>منتجات تناسب احتياجك</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
