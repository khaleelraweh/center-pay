@extends('layouts.app')

@section('style')

<style>
  .prd{
    margin-left: 0 !important;
    margin-right: 0 !important;
  }
  .prd-price{
    justify-content: center !important;
  }
  .prd-action-left{
    justify-content: center !important;
  }
  .prd .prd-action {
    justify-content: center;
    margin-top: 5px;
  }
</style>
    
@endsection

@section('content')   

  {{-- Main slider part  --}}
  <div class="holder fullwidth fullwidth mt-0 full-nopad">
    <div class="container">

      {{-- {{dd($main_sliders)}} --}}
      {{-- {{dd($adv_sliders)}} --}}
      {{-- {{dd($featured_product_cards)}} --}}
      {{-- {{dd($card_categories)}} --}}
      {{-- {{dd($random_product_cards)}} --}}
      {{-- {{dd($common_questions)}} --}}

      <div class="bnslider-wrapper">
        <div
          class="bnslider bnslider--lg keep-scale"
          id="bnslider-001"
          data-slick='{"arrows": true, "dots": false}'
          data-autoplay="true"
          data-speed="5000"
          data-start-width="1920"
          data-start-height="880"
          data-start-mwidth="1550"
          data-start-mheight="1000"
        >
        
        @forelse ($main_sliders as $main_slider)
        @if ($loop->first)
          {{-- slider slid  --}}
          <div class="bnslider-slide">
            {{-- for desktop --}}
            <div
              class="bnslider-image-mobile lazyload fade-up"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
            ></div>

            {{-- for mobile --}}
            <div
              class="bnslider-image-mobile lazyload bnslider-lightning bnslider-flashit"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
              style="opacity: 0"
            ></div>

            <div
              class="bnslider-image lazyload fade-up"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
            ></div>

            <div
              class="bnslider-image lazyload bnslider-lightning bnslider-flashit"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
              style="opacity: 0"
            ></div>

            <div class="bnslider-text-wrap bnslider-overlay">
              <div class="bnslider-text-content txt-middle txt-center">
                <div class="bnslider-text-content-flex">
                  <div class="bnslider-vert w-s-60 w-ms-100">
                    <div
                      class="bnslider-text order-1 mt-sm bnslider-text--xl text-center heading-font"
                      data-animation="fadeInUp"
                      data-animation-delay="500"
                      data-fontcolor="#fff"
                      data-fontweight="900"
                    >
                      {{$main_slider->title}}
                      
                    </div>
                    <div
                      class="bnslider-text order-2 mt-sm bnslider-text--sm text-center heading-font"
                      data-animation="fadeInUp"
                      data-animation-delay="1000"
                      data-fontcolor="#fff"
                      data-fontweight="900"
                    >
                    {!!$main_slider->content!!}
                    </div>
                    <div
                      class="btn-wrap text-center order-3 mt-lg"
                      data-animation="fadeIn"
                      data-animation-delay="2000"
                      style="opacity: 1"
                    >
                      <a
                        href="../../../https@bit.ly/3iLAAEp"
                        class="btn btn--invert btn--lg"
                        >تسوق الان</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @else
          {{-- slider slid  --}}
          <div class="bnslider-slide">
            <div
              class="bnslider-image-mobile lazyload"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
            ></div>

            <div
              class="bnslider-image lazyload"
              data-bgset="{{asset('assets/sliders/'.$main_slider->firstMedia?->file_name)}}"
            ></div>
            
            <div class="bnslider-text-wrap bnslider-overlay">
              <div class="bnslider-text-content txt-middle txt-center">
                <div class="bnslider-text-content-flex">
                  <div class="bnslider-vert w-s-60 w-ms-100">
                    <div
                      class="bnslider-text order-1 mt-sm bnslider-text--xl text-center heading-font"
                      data-animation="fadeInUp"
                      data-animation-delay="500"
                      data-fontcolor="#fff"
                      data-fontweight="900"
                    >
                      {{$main_slider->title}}
                    </div>
                    <div
                      class="bnslider-text order-2 mt-sm bnslider-text--sm text-center heading-font"
                      data-animation="fadeInUp"
                      data-animation-delay="1000"
                      data-fontcolor="#fff"
                      data-fontweight="900"
                    >
                      {!! $main_slider->content !!}
                    </div>
                    <div
                      class="btn-wrap text-center order-3 mt-lg"
                      data-animation="fadeIn"
                      data-animation-delay="2000"
                      style="opacity: 1"
                    >
                      <a
                        href="../../../https@bit.ly/3iLAAEp"
                        class="btn btn--invert btn--lg"
                        >Shop now</a
                      >
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
            <div
              class="bnr-wrap d-flex align-items-center h-100 bnr-1586628920521-0"
            >
              <div
                class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--middle bnr--center"
                data-fontratio="5.9"
              >
                <div
                  class="bnr-img image-container"
                  style="padding-bottom: 38.933%"
                >
                  <img
                    data
                    srcset="{{asset('assets/sliders/'.$adv_slider->firstMedia?->file_name)}}"
                    class="lazyload fade-up"
                    alt=""
                  />
                </div>
                <div class="bnr-caption" style="padding: 4% 4%; width: 100%">
                  <div
                    class="bnr-text3 mt-0 order-1"
                    style="
                      font-size: 0.15em;
                      font-weight: 700;
                      line-height: 1em;
                    "
                  >
                    2 0 2 0
                  </div>
                  <div
                    class="bnr-text3 mt-xs order-2"
                    style="
                      font-size: 0.4em;
                      font-weight: 800;
                      line-height: 1em;
                    "
                  >
                    {{$adv_slider->title}}
                  </div>
                  <div
                    class="bnr-text3 mt-xs order-2"
                    style="
                      font-size: 0.2em;
                      font-weight: 500;
                      line-height: 1em;
                    "
                  >
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

  {{-- best product cards --}}
  <div class="holder">
    <div class="container">
      <div class="title-wrap text-center">
        <h2 class="h1-style">الباقات الجديدة</h2>
        <div class="carousel-arrows"></div>
      </div>
      <div
        class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
        data-slick='{"slidesToShow": 5, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'
      >

      @forelse ($featured_product_cards as $featured_product_card)
        <div class=" prd prd--style2 prd-labels--max prd-labels-shadow">
          <div class="prd-inside">
            <div class="prd-img-area">
              <a href="product.html" class="prd-img image-container">
                {{-- first image  --}}
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="{{asset('assets/products/'.$featured_product_card->firstMedia->file_name)}}"
                  alt="بطائق الدفع"
                  class="js-prd-img lazyload fade-up"
                />
                {{-- second image in the same product card the other side  --}}
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="{{asset('assets/products/'.$featured_product_card->lastMedia->file_name)}}"
                  alt="بطائق الدفع"
                  class="js-prd-img lazyload fade-up"
                />
                <div class="foxic-loader"></div>
                <div class="prd-big-circle-labels">
                  <div class="label-sale">
                    <span>{{$featured_product_card->offer_price}}% <span class="sale-text">تخفيض</span></span>
                    <div class="countdown-circle">
                      <div
                        class="countdown js-countdown"
                        data-countdown="2021/07/01"
                      ></div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="prd-circle-labels">
                <a
                  href="#"
                  class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                  title="Add To Wishlist"
                  ><i class="icon-heart-stroke"></i></a
                ><a
                  href="#"
                  class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                  title="Remove From Wishlist"
                  ><i class="icon-heart-hover"></i
                ></a>
                <a
                  href="#"
                  class="circle-label-qview js-prd-quickview prd-hide-mobile"
                  data-src="ajax/ajax-quickview.html"
                  ><i class="icon-eye"></i><span>استعراض سريع</span></a
                >
              </div>
            </div>
            <div class="prd-info">
              <div class="prd-info-wrap">
                <div class="prd-info-top">
                  <div class="prd-tag"><a href="#">القسم</a></div>
                </div>
                <div class="prd-rating justify-content-center">
                  <i class="icon-star-fill fill"></i
                  ><i class="icon-star-fill fill"></i
                  ><i class="icon-star-fill fill"></i
                  ><i class="icon-star-fill fill"></i
                  ><i class="icon-star-fill fill"></i>
                </div>
                <div class="prd-tag"><a href="#">القسم</a></div>
                <h2 class="prd-title">
                  <a href="product.html">{{$featured_product_card->category->name}}</a>
                </h2>
                <div class="prd-description">
                  Quisque volutpat condimentum velit. Class aptent taciti
                  sociosqu ad litora torquent per conubia nostra, per
                  inceptos himenaeos. Nam nec ante sed lacinia.
                </div>
              </div>
              <div class="prd-hovers">
                <div class="prd-circle-labels">
                  <div>
                    <a
                      href="#"
                      class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                      title="Add To Wishlist"
                      ><i class="icon-heart-stroke"></i></a
                    ><a
                      href="#"
                      class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                      title="Remove From Wishlist"
                      ><i class="icon-heart-hover"></i
                    ></a>
                  </div>
                  <div>
                    <a
                      href="#"
                      class="circle-label-qview prd-hide-mobile js-prd-quickview"
                      data-src="ajax/ajax-quickview.html"
                      ><i class="icon-eye"></i><span>استعراض سريع</span></a
                    >
                  </div>
                </div>
                <div class="prd-price">
                  <div class="price-old">$ 200</div>
                  <div class="price-new">$ {{$featured_product_card->price}}</div>
                </div>
                <div class="prd-action">
                  <div class="prd-action-left">
                    <form action="#">
                      <button
                        class="btn js-prd-addtocart"
                        data-product='{"name": "{{$featured_product_card->name}}", "path":"{{asset('assets/products/'.$featured_product_card->firstMedia->file_name)}}", "url":"product.html", "aspect_ratio":0.778}'
                      >
                        اضافة للسلة
                      </button>
                    </form>
                  </div>
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


  {{-- random product cards --}}
  <div class="holder">
    <div class="container">
      <div class="title-wrap text-center">
        <h2 class="h1-style">تصفح الباقات العشوائية</h2>
        <div class="carousel-arrows"></div>
      </div>

      <div class="row prd-grid text-center align-center">

        @forelse ($random_product_cards as $random_product_card)
          <div class="py-4 col-xl-3 col-lg-4 col-sm-6 prd prd--style2 prd-labels--max prd-labels-shadow">
            <div class="prd-inside">
              <div class="prd-img-area">
                <a href="product.html" class="prd-img image-container">
                  <img
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    data-src="{{asset('assets/products/'.$random_product_card->firstMedia->file_name)}}"
                    alt="بطائق الدفع"
                    class="js-prd-img lazyload fade-up"
                  />
                  <img
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    data-src="{{asset('assets/products/'.$random_product_card->lastMedia->file_name)}}"
                    alt="بطائق الدفع"
                    class="js-prd-img lazyload fade-up"
                  />
                  <div class="foxic-loader"></div>
                  <div class="prd-big-circle-labels">
                    <div class="label-sale">
                      <span>-{{$random_product_card->offer_price}}% <span class="sale-text">تخفيض</span></span>
                      <div class="countdown-circle">
                        <div
                          class="countdown js-countdown"
                          data-countdown="2021/07/01"
                        ></div>
                      </div>
                    </div>
                  </div>
                </a>
                <div class="prd-circle-labels">
                  <a
                    href="#"
                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                    title="Add To Wishlist"
                    ><i class="icon-heart-stroke"></i></a
                  ><a
                    href="#"
                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                    title="Remove From Wishlist"
                    ><i class="icon-heart-hover"></i
                  ></a>
                  <a
                    href="#"
                    class="circle-label-qview js-prd-quickview prd-hide-mobile"
                    data-src="ajax/ajax-quickview.html"
                    ><i class="icon-eye"></i><span>استعراض سريع</span></a
                  >
                </div>
              </div>
              <div class="prd-info">
                <div class="prd-info-wrap">
                  <div class="prd-info-top">
                    <div class="prd-tag"><a href="#">القسم</a></div>
                  </div>
                  <div class="prd-rating justify-content-center">
                    <i class="icon-star-fill fill"></i
                    ><i class="icon-star-fill fill"></i
                    ><i class="icon-star-fill fill"></i
                    ><i class="icon-star-fill fill"></i
                    ><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="prd-tag"><a href="#">القسم</a></div>
                  <h2 class="prd-title">
                    <a href="product.html">{{$random_product_card->name}}</a>
                  </h2>
                  <div class="prd-description">
                    Quisque volutpat condimentum velit. Class aptent taciti
                    sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos. Nam nec ante sed lacinia.
                  </div>
                </div>
                <div class="prd-hovers">
                  <div class="prd-circle-labels">
                    <div>
                      <a
                        href="#"
                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                        title="Add To Wishlist"
                        ><i class="icon-heart-stroke"></i></a
                      ><a
                        href="#"
                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                        title="Remove From Wishlist"
                        ><i class="icon-heart-hover"></i
                      ></a>
                    </div>
                    <div>
                      <a
                        href="#"
                        class="circle-label-qview prd-hide-mobile js-prd-quickview"
                        data-src="ajax/ajax-quickview.html"
                        ><i class="icon-eye"></i><span>استعراض سريع</span></a
                      >
                    </div>
                  </div>
                  <div class="prd-price">
                    <div class="price-old">$ 200</div>
                    <div class="price-new">$ {{$random_product_card->price}}</div>
                  </div>
                  <div class="prd-action">
                    <div class="prd-action-left">
                      <form action="#">
                        <button
                          class="btn js-prd-addtocart"
                          data-product='{"name": "{{$random_product_card->name}}", "path":"{{asset('assets/products/'.$random_product_card->lastMedia->file_name)}}", "url":"product.html", "aspect_ratio":0.778}'
                        >
                          اضافة للسلة
                        </button>
                      </form>
                    </div>
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

  {{-- card categories  --}}
  <div class="holder global_width">
    <div class="container">
      <div class="title-wrap text-center">
        <h2 class="h1-style">اختر البطاقة المناسبة لك</h2>
      </div>
      <div
        class="prd-grid prd-promo-carousel data-to-show-4 js-prd-promo-carousel"
      >

        @forelse ($card_categories as $card_category)
          <div class="prd-promo prd-promo--lg prd-has-loader">
            <div class="prd-inside">
              <div class="prd-img-area">
                <a href="product.html" class="image-hover-scale">
                  <img
                    src="{{asset('assets/product_categories/'.$card_category->firstMedia->file_name)}}"
                    alt="{{$card_category->name}}"
                    class="js-prd-img"
                  />
                  <div class="prd-big-circle-labels">
                    <div class="label-sale">
                      <span>-false <span class="sale-text">Sale</span></span>
                      <div class="countdown-circle">
                        <div
                          class="countdown js-countdown"
                          data-countdown="2021/07/01"
                        ></div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="prd-info text-center">
                <h2 class="prd-title"><a href="product.html">{{$card_category->name}}</a></h2>
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
                    <button
                      class="btn js-prd-addtocart"
                      {{-- data-product='{"name": "بطائق الدفع", "path":"{{asset('frontend/assests/images/skins/games/products/product-07-1.webp')}}", "url":"product.html", "aspect_ratio":0.778}' --}}
                    >
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

  {{-- product cards news --}}
  {{-- <div class="holder holder-mt-medium">
    <div class="container">
      <div class="title-with-arrows">
        <h2 class="h1-style">
          <a href="blog.html" title="View all">أحر أخبار الألعاب</a>
        </h2>
        <div class="carousel-arrows"></div>
      </div>
      <div
        class="post-prws post-prws-carousel post-prws-carousel--single js-post-prws-carousel"
        data-slick='{"slidesToShow": 2, "responsive": [{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'
      >
        <div class="post-prw">
          <div class="row vert-margin-middle">
            <div class="post-prw-img col-sm-6">
              <a
                href="blog-post.html"
                class="d-block image-container"
                style="padding-bottom: 88.92%"
              >
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="{{asset('frontend/assests/images/skins/games/blog/game-blog-01.webp')}}"
                  class="lazyload fade-up"
                  alt="Blog Title"
                />
              </a>
            </div>
            <div class="post-prw-text col-sm-6">
              <h4 class="post-prw-title">
                <a href="#">لقطات هذا الأسبوع</a>
              </h4>
              <div class="post-prw-links">
                <div class="post-prw-date">
                  <i class="icon-calendar1"></i
                  ><span>November 17, 2020</span>
                </div>
              </div>
              <div class="post-prw-teaser">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna
              </div>
              <div class="post-prw-btn">
                <a href="#" class="btn btn--md">اقرأ المزيد</a>
              </div>
            </div>
          </div>
        </div>
        <div class="post-prw">
          <div class="row vert-margin-middle">
            <div class="post-prw-img col-sm-6">
              <a
                href="blog-post.html"
                class="d-block image-container"
                style="padding-bottom: 88.92%"
              >
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="{{asset('frontend/assests/images/skins/games/blog/game-blog-03.webp')}}"
                  class="lazyload fade-up"
                  alt="Blog Title"
                />
              </a>
            </div>
            <div class="post-prw-text col-sm-6">
              <h4 class="post-prw-title">
                <a href="#">البعثات الجديدة عبر الإنترنت</a>
              </h4>
              <div class="post-prw-links">
                <div class="post-prw-date">
                  <i class="icon-calendar1"></i
                  ><span>November 17, 2020</span>
                </div>
              </div>
              <div class="post-prw-teaser">
                Nullam quis hendrerit nisi. Donec porta hendrerit
                sollicitudin. Vestibulum elit tortor, commodo in iaculis
                quis, imperdiet non eros
              </div>
              <div class="post-prw-btn">
                <a href="#" class="btn btn--md">اقرأ المزيد</a>
              </div>
            </div>
          </div>
        </div>
        <div class="post-prw">
          <div class="row vert-margin-middle">
            <div class="post-prw-img col-sm-6">
              <a
                href="blog-post.html"
                class="d-block image-container"
                style="padding-bottom: 88.92%"
              >
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  data-src="{{asset('frontend/assests/images/skins/games/blog/game-blog-02.webp')}}"
                  class="lazyload fade-up"
                  alt="Blog Title"
                />
              </a>
            </div>
            <div class="post-prw-text col-sm-6">
              <h4 class="post-prw-title">
                <a href="#"
                  >Fusce erat arcu, rhoncus sit amet convallis eu, laoreet
                  ut libero. Quisque dictum ante ac lectus iaculis, ac
                  aliquet libero commodo</a
                >
              </h4>
              <div class="post-prw-links">
                <div class="post-prw-date">
                  <i class="icon-calendar1"></i
                  ><span>December 19, 2020</span>
                </div>
              </div>
              <div class="post-prw-btn">
                <a href="#" class="btn btn--md">اقرأ المزيد</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- get discount by login --}}
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
                  <input
                    type="text"
                    class="form-control"
                    placeholder="ادخل الايميل..."
                  />
                  <svg preserveAspectRatio="none">
                    <rect
                      x="2"
                      y="2"
                      rx="6"
                      height="100%"
                      width="100%"
                    ></rect>
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

  <div class="holder holder-subscribe-full mt-0" style="background-color: transparent" >
    <div class="container">
      <div class="title-wrap text-center">
        <h3 class="h2-style testimonials-carousel-simple-name">الإستفسارات</h3>
        <h2 class="h1-style">الاسئلة الشائعة</h2>
      </div>
      <div class="row p-5">
        <div class="col-md-12">
          <div class="wrapper center-block">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="14">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                    حصلت لي مشكلة كيف أقوم بالتواصل معكم؟
                    </a>
                  </h4>
                </div>
                <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="14">
                  <div class="panel-body">
                  <p>حصلت لي مشكلة كيف أقوم بالتواصل معكم؟</p>

                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="6">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                    هل متجر "سنتر باي CenterPay" آمن وموثوق؟
                    </a>
                  </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="6">
                  <div class="panel-body">
                  <p><b>متجر </b>سنتر باي CenterPay <b>آمن وموثوق ومسجل في وزارة التجارة ومنصة معروف برقم&nbsp;164491</b><span style="color: rgb(68, 68, 68); font-family: dinnextltarabic-regular; font-size: 13px; white-space: pre-wrap; background-color: transparent;"><b>????</b></span></p><p>&nbsp;</p>
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="5">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    ماهي طرق الدفع المتوفرة؟
                    </a>
                  </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                  <div class="panel-body">
                  <p><b>طرق الدفع عندنا حالياً ( مدى - فيزا - ماستر كارد - STCPay ) تقبل لجميع البنوك وجميع الدول العربية <img alt="????????" class="emojione" src="https://ish7nha.com/vendor/emojione/png/32/1f44c-1f3fb.png" title=":ok_hand_tone1:" /><img alt="????" class="emojione" src="https://ish7nha.com/vendor/emojione/png/32/1f9f8.png" title=":teddy_bear:" /></b></p>

                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="4">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    كيف اقوم بالشراء؟
                    </a>
                  </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="4">
                  <div class="panel-body">
                  <p><b>﻿قم باختيار المنتج الذي تريده الى سلة المشتريات بعد ذلك انتقل الى السلة وقم باتمام الدفع عبر طرق الدفع وسيصلك المنتج بشكل فوري </b></p>

                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="3">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    كيف اشحن شدات ببجي ؟
                    </a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="3">
                  <div class="panel-body">
                  <p class="text-base dark:text-white text-black">&nbsp;</p>

                  <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;"><b><span data-darkreader-inline-color="" style="--darkreader-inline-color:  #b1aba1; font-family: Nunito;">&nbsp;بمجرد أتمامكم لعملية الشراء ماعليك بعد الشراء هو نسخ الكود و وضعة في موقع ببجي الرسمي ???? ✅:</span><br />
                  <span style="font-family: Nunito;">1 - يجب عليك دخول موقع ببجي الرسمي لشحن الكود&nbsp;</span><br />
                  <span style="font-family: Nunito;">- قم بالبحث في قوقل : midasbuy redeem</span><br />
                  <span data-darkreader-inline-color="" style="--darkreader-inline-color:  #b1aaa0;">2- عمل تسجيل دخول او انشاء حساب جديد ????</span><br />
                  <span data-darkreader-inline-bgcolor="" style="--darkreader-inline-bgcolor:  transparent;">- في حال لايوجد لديك حساب استعمل الحساب هذا :&nbsp;</span></b></p>

                  <p data-darkreader-inline-color="" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0; --darkreader-inline-color:  #b1aaa0;"><b>Centerpay.pubg@gmail.com</b></p>

                  <p data-darkreader-inline-color="" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0; --darkreader-inline-color:  #b1aaa0;"><b>CenterPay123</b></p>

                  <p data-darkreader-inline-color="" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0; --darkreader-inline-color:  #b1aaa0;"><b>3 - تقوم بوضع الايدي <img alt="????" class="emojione" src="https://ish7nha.com/vendor/emojione/png/32/1f194.png" title=":id:" /></b></p>

                  <p data-darkreader-inline-color="" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0; --darkreader-inline-color:  #b1aaa0;"><b>4 - تقوم بوضع الكود <img alt="????" class="emojione" src="https://ish7nha.com/vendor/emojione/png/32/1f510.png" title=":closed_lock_with_key:" /></b></p>

                  <p data-darkreader-inline-color="" style="margin-right: 0px; margin-left: 0px; cursor: text; padding: 0px; counter-reset: list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0; --darkreader-inline-color:  #b1aaa0;"><b>5 - مبروك الشدات وصلت حسابك <img alt="????" class="emojione" src="https://ish7nha.com/vendor/emojione/png/32/1f389.png" title=":tada:" /></b></p>

                  <p>&nbsp;</p>

                  </div>
                </div>
              </div>
                                 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="holder holder-subscribe-full mt-0" style="background-color: transparent">
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
                  <input
                    type="text"
                    class="form-control"
                    placeholder="ادخل الايميل..."
                  />
                  <svg preserveAspectRatio="none">
                    <rect
                      x="2"
                      y="2"
                      rx="6"
                      height="100%"
                      width="100%"
                    ></rect>
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
  </div>

  <div class="holder mt-0">
    <div class="container">
      <div
        class="text-icn-blocks-row text-icn-blocks-row--nodivider justify-content-center"
      >
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
  </div>

@endsection


