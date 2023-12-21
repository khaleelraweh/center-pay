<div wire:ignore>

    <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
        data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>


        @forelse ($more_cards as $more_card)
            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                <div class="prd-inside">
                    <div class="prd-img-area">

                        {{-- image area --}}
                        <a href="{{ route('frontend.card', $more_card->slug) }}"
                            class="prd-img image-hover-scale image-container">
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-src="{{ asset('assets/cards/' . $more_card->firstMedia->file_name) }}"
                                alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                            <div class="foxic-loader"></div>
                            <div class="prd-big-squared-labels">
                            </div>
                        </a>

                        {{-- top control area  --}}
                        <div class="prd-circle-labels">
                            <a href="#" wire:click.prevent="addToWishList('{{ $more_card->id }}')"
                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                title="Add To Wishlist">
                                <i class="icon-heart-stroke"></i>
                            </a>
                            <a href="#"
                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                title="Remove From Wishlist">
                                <i class="icon-heart-hover"></i>
                            </a>
                            {{-- <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                data-src="ajax/ajax-quickview.html">
                                <i class="icon-eye"></i>
                                <span>استعراض سريع</span>
                            </a> --}}
                        </div>

                        {{-- Link style switcher  --}}
                        <ul class="list-options color-swatch">

                            @foreach ($more_card->photos as $photo)
                                <li data-image="{{ asset('assets/cards/' . $photo->file_name) }}"
                                    class="{{ $loop->first ? 'active' : null }}">
                                    <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                        data-placement="right" title="{{ $more_card->name }}">
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                            class="lazyload fade-up" alt="{{ $more_card->name }}">
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                    </div>

                    {{-- button info --}}
                    <div class="prd-info">
                        <div class="prd-info-wrap">
                            <div class="prd-info-top">
                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                        class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
                                        class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                                </div>
                            </div>
                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i
                                    class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
                                    class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                            <div class="prd-tag"><a href="#">Seiko</a></div>
                            <h2 class="prd-title"><a href="product.html">Midi Dress with
                                    Belt</a></h2>
                            <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu
                                ad litora
                                torquent per conubia nostra, per inceptos himenaeos. Nam nec
                                ante sed lacinia.
                            </div>
                            <div class="prd-action">
                                <form action="#">
                                    <button class="btn js-prd-addtocart"
                                        wire:click.prevent="addToCart('{{ $more_card->id }}')"
                                        data-product='{"name": "Midi Dress with Belt", "path":"{{ asset('
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    frontend/assests/images/skins/fashion/cards/product-06-1.webp') }}", "url"
                                                                :"product.html", "aspect_ratio" :0.778}'>
                                        اضافة للسلة
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="prd-hovers">
                            <div class="prd-circle-labels">
                                <div><a href="#"
                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div class="prd-hide-mobile"><a href="#"
                                        class="circle-label-qview js-prd-quickview"
                                        data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK
                                            VIEW</span></a></div>
                            </div>
                            <div class="prd-price">
                                <div class="price-new">$ 180</div>
                            </div>
                            <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart"
                                            wire:click.prevent="addToCart('{{ $more_card->id }}')"
                                            data-product='{"name": "Midi Dress with Belt", "path":"{{ asset('
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            frontend/assests/images/skins/fashion/cards/product-06-1.webp') }}", "url"
                                                                    :"product.html", "aspect_ratio" :0.778}'>Add
                                            To Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            There is no Product related to this Product
        @endforelse

    </div>

</div>
