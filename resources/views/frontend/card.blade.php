@extends('layouts.app')

@section('style')
    <style>
        span.text {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a
                            href="{{ route('frontend.card_category', $card->category->slug) }}">{{ $card->category->category_name }}</a>
                    </li>
                    <li class="active"><span> {{ $card->product_name }}</span></li>
                </ul>
            </div>
        </div>


        {{-- review and card show image and detail part --}}
        <div class="holder mt-0">
            <div class="container js-prd-gallery" id="prdGallery">
                <div class="row prd-block prd-block-under prd-block--prv-bottom">
                    {{-- rating and  review part --}}
                    <div class="col">
                        <div class="js-prd-d-holder">
                            <div class="prd-block_title-wrap">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row prd-block prd-block--prv-bottom">
                    {{-- slider show for card product  --}}
                    <div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <div class="mb-2 js-prd-m-holder"></div>

                            {{-- This part is for main product image of the product  --}}
                            <div class="prd-block_main-image">
                                <div class="prd-block_main-image-holder" id="prdMainImage">
                                    {{-- main images in the frame  --}}
                                    <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

                                        @foreach ($card->photos as $photo)
                                            <div data-value="Beige">
                                                <span class="prd-img">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                                        alt="{{ $card->name }}"
                                                        data-zoom-image="{{ asset('assets/cards/' . $photo->file_name) }}" />
                                                </span>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>

                            {{-- images link views --}}
                            <div class="product-previews-wrapper">

                                <div class="product-previews-carousel js-product-previews-carousel">

                                    @foreach ($card->photos as $photo)
                                        <a href="#" data-value="Beige">
                                            <span class="prd-img">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                                    class="lazyload fade-up" alt="" />
                                            </span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- description part  --}}
                    <div class="col-md-7 col-lg-7 col-xl-7 mt-1 mt-md-0">


                        <div class="prd-block_info prd-block_info--style1"
                            data-prd-handle="/cards/copy-of-suede-leather-mini-skirt">
                            <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                                <h1 class="mb-0 " style="font-size: 35px ; font-weight:bold"> {{ $card->product_name }}
                                </h1>
                            </div>


                            <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                                <div class="prd-block_price prd-block_price--style2">
                                    <div class="prd-block_price--actual main-color"
                                        style="font-size: 20px; font-weight:bold">
                                        {{ currency_converter($card->price - $card->offer_price) }}
                                    </div>
                                    <div class="prd-block_price-old-wrap" style="margin-top:0; margin-top:10px;padding:0">

                                        <span class="prd-block_price--text prd-block_price--old"
                                            style="padding: 0px;font-size:20px;">
                                            <small>
                                                <sub>{{ currency_converter($card->price) }}</sub>
                                            </small>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="prd-block_description prd-block_info_item ">
                                <h3 class="small_desc">
                                    {!! substr(strip_tags($card->description), 0, 200) !!} ...
                                </h3>



                                <div class="section">
                                    <span class="text">
                                        {!! $card->description !!}
                                    </span>
                                    <div class="mt-1"></div>
                                    <a class="button jkit-btn-inverse toggle  btn-link read-more"
                                        style="cursor: pointer;">Read
                                        More</a>
                                </div>
                            </div>

                            {{-- quentity , add to card , add to wishlist part using livewire  --}}
                            <livewire:frontend.card.update-qty-component :card="$card" />

                            <div class="prd-block_info_item">
                                <ul class="prd-block_links list-unstyled">

                                    <li>
                                        <i class="icon-delivery-1"></i>
                                        <a href="#" data-fancybox class="modal-info-link" data-src="#deliveryInfo">
                                            التسليم واعادة الطلب
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon-email-1"></i>
                                        <a href="#" data-fancybox class="modal-info-link" data-src="#contactModal">
                                            اسأل عن هذا المنتج
                                        </a>
                                    </li>
                                </ul>



                                <div id="deliveryInfo" style="display: none;"
                                    class="modal-info-content modal-info-content-lg">

                                    <div class="modal-info-heading">
                                        <div class="mb-1">
                                            <i class="icon-delivery-1"></i>
                                        </div>
                                        <h2>
                                            التسليم واعادة الطلب
                                        </h2>
                                    </div>
                                    <br>
                                    <h5>لدينا خدمة البريد السريع الطرود</h5>
                                    <p>
                                        تفتخر شركة Foxic بتقديم خدمة شحن الطرود الدولية الاستثنائية. هو - هي
                                        من السهل جدًا تنظيم شحن الطرود الدولية. ملكنا
                                        يعمل فريق خدمة العملاء على مدار الساعة للتأكد من حصولك على جودة عالية
                                        خدمة البريد السريع الجودة من البداية إلى النهاية.
                                    </p>
                                    <p>
                                        إرسال الطرود معنا أمر بسيط. لبدء العملية، ستحتاج أولاً إلى ذلك
                                        احصل على عرض أسعار باستخدام خدمة عرض الأسعار المجانية عبر الإنترنت. من هذا،
                                        سوف تكون
                                        قادرًا
                                        للتنقل عبر النموذج عبر الإنترنت لحجز تاريخ استلام الطرود الخاصة بك،
                                        اختيار يوم الشحن المناسب لك.
                                    </p>
                                    <br>
                                    <h5>وقت الشحن</h5>
                                    <p>
                                        يعتمد وقت الشحن على طريقة الشحن التي اخترتها.
                                        <br>
                                        EMS يستغرق حوالي 5-10 أيام عمل للتسليم.
                                        <br>
                                        DHL يستغرق حوالي 2-5 أيام عمل للتسليم.
                                        <br>
                                        DPEX يستغرق حوالي 2-8 أيام عمل للتسليم.
                                        <br>
                                        JCEX يستغرق حوالي 3-7 أيام عمل للتسليم.
                                        <br>
                                        يستغرق البريد الصيني المسجل 20-40 يوم عمل للتسليم.
                                    </p>

                                </div>

                                <div id="contactModal" style="display: none;"
                                    class="modal-info-content modal-info-content-sm">

                                    <div class="modal-info-heading">
                                        <div class="mb-1">
                                            <i class="icon-envelope"></i>
                                        </div>
                                        <h2>
                                            لدي سؤال؟
                                        </h2>
                                    </div>
                                    <form method="post" action="#" id="contactForm" class="contact-form">
                                        <div class="form-group">
                                            <input type="text" name="contact[name]" class="form-control form-control--sm"
                                                placeholder="الاسم">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact[email]"
                                                class="form-control form-control--sm" placeholder="الايميل" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact[phone]"
                                                class="form-control form-control--sm" placeholder="رقم التلفون">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textarea--height-170" name="contact[body]" placeholder="Message" required=""></textarea>
                                        </div>
                                        <button class="btn" type="submit">
                                            اسأل مستشارنا
                                        </button>
                                        <p class="p--small mt-15 mb-0">
                                            وسوف نتواصل بك قريبا
                                        </p>
                                        <input name="recaptcha-v3-token" type="hidden"
                                            value="03AGdBq27T8WvzvZu79QsHn8lp5GhjNX-w3wkcpVJgCH15Ehh0tu8c9wTKj4aNXyU0OLM949jTA4cDxfznP9myOBw9m-wggkfcp1Cv_vhsi-TQ9E_EbeLl33dqRhp2sa5tKBOtDspTgwoEDODTHAz3nuvG28jE7foIFoqGWiCqdQo5iEphqtGTvY1G7XgWPAkNPnD0B9V221SYth9vMazf1mkYX3YHAj_g_6qhikdQDsgF2Sa2wOcoLKWiTBMF6L0wxdwhIoGFz3k3VptYem75sxPM4lpS8Y_UAxfvF06fywFATA0nNH0IRnd5eEPnnhJuYc5LYsV6Djg7_S4wLBmOzYnahC-S60MHvQFf-scQqqhPWOtgEKPihUYiGFBJYRn2p1bZwIIhozAgveOtTNQQi7FGqmlbKkRWCA">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- related cards with livewire note: $related_cards came from FrontendController#card --}}
        @if (count($related_cards) > 0)
            <livewire:frontend.card.related-cards-component :related_cards="$related_cards" />
        @endif

    </div>
@endsection


@section('script')
    <script>
        var readMore = jQuery(document).ready(function() {

            $(".section .toggle").click(function() {

                var elem = $(this);
                if (elem.hasClass('read-more')) {
                    //Stuff to do when btn is in the read more state
                    $(this).text("Read Less");
                    $(this).parent().find('.text').slideDown();
                    $(".small_desc").slideUp();

                    elem.removeClass('read-more');
                    elem.addClass('read-less');
                } else {
                    //Stuff to do when btn is in the read less state
                    $(this).text("Read More");
                    $(this).parent().find('.text').slideUp();
                    $(".small_desc").slideDown();

                    elem.removeClass('read-less');
                    elem.addClass('read-more');

                }



            });
        });
    </script>
@endsection
