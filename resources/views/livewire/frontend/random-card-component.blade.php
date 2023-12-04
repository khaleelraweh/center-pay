<div wire:ignore>
    <div class="holder">
        <div class="container">
          <div class="title-wrap text-center">
            <h2 class="h1-style">تصفح الباقات العشوائية</h2>
            <div class="carousel-arrows"></div>
          </div>
    
          <div class="row prd-grid text-center align-center">
    
            @forelse ($random_cards as $random_product_card)
              <div class="py-4 col-xl-3 col-lg-4 col-sm-6 prd prd--style2 prd-labels--max prd-labels-shadow">
                <div class="prd-inside">
                  <div class="prd-img-area">
                    <a href="{{route('frontend.card',$random_product_card->slug)}}" class="prd-img image-container">
                      <img
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{asset('assets/cards/'.$random_product_card->firstMedia->file_name)}}"
                        alt="بطائق الدفع"
                        class="js-prd-img lazyload fade-up"
                      />
                      <img
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{asset('assets/cards/'.$random_product_card->lastMedia->file_name)}}"
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
                        wire:click.prevent="addToWishList('{{$random_product_card->id}}')" 
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
                            wire:click.prevent="addToWishList('{{$random_product_card->id}}')"
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
                              wire:click.prevent="addToCart('{{$random_product_card->id}}')"
                              data-product='{"name": "{{$random_product_card->name}}", "path":"{{asset('assets/cards/'.$random_product_card->lastMedia->file_name)}}", "url":"product.html", "aspect_ratio":0.778}'
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
</div>
