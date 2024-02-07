<div wire:ignore class="col-lg aside">
    <div class="prd-grid-wrap">
        <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid"
            data-grid-tab-content>

            @forelse ($cards as $card)

                <div class="prd prd--style2 prd-labels--max prd-labels-shadow">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="{{ route('frontend.card', $card->slug) }}"
                                class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-src="{{ asset('assets/cards/' . $card->firstMedia?->file_name) }}"
                                    alt="{{ $card->product_name }}" class="js-prd-img lazyload fade-up" />

                                {{-- rounded circle discount --}}
                                @if ($card->offer_price > 0)
                                    <div class="foxic-loader"></div>
                                    <div class="prd-big-circle-labels">
                                        <div class="label-sale">
                                            <span>
                                                {{ number_format(($card->offer_price / $card->price) * 100, 0, '.', ',') }}%-

                                            </span>
                                            <div class="countdown-circle">
                                                <div class="countdown js-countdown" data-countdown="2021/07/01">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </a>

                            {{-- add to wisth list and view prefiew info --}}
                            <div class="prd-circle-labels">
                                <a href="#" wire:click.prevent="addToWishList('{{ $card->id }}')"
                                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                    title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
                                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                    title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>

                            </div>

                            {{-- color style switcher  --}}
                            <ul class="list-options color-swatch">

                                @foreach ($card->photos as $photo)
                                    <li data-image="{{ asset('assets/cards/' . $photo?->file_name) }}"
                                        class="{{ $loop->first ? 'active' : null }}">
                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                            data-placement="right" title="{{ $card->product_name }}">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="{{ asset('assets/cards/' . $photo?->file_name) }}"
                                                class="lazyload fade-up" alt="{{ $card->product_name }}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">

                                <div class="prd-tag">
                                    <a href="{{ route('frontend.card_category', $card->category->slug) }}">
                                        {{ $card->category->category_name }}
                                    </a>
                                </div>

                                <h2 class="prd-title">
                                    <a href="{{ route('frontend.card', $card->slug) }}">
                                        {{ $card->product_name }}
                                    </a>
                                </h2>


                                <div class="prd-action">
                                    <form action="#">
                                        <button class="btn js-prd-addtocart"
                                            wire:click.prevent="addToCart('{{ $card->id }}')"
                                            data-product='{"name": "{{ $card->product_name }}", "path":"{{ asset('assets/cards/' . $card->firstMedia?->file_name) }}", "url":"{{ route('frontend.card', $card->slug) }}", "aspect_ratio":0.778}'>
                                            {{ __('panel.f_add_to_card') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div>
                                        <a href="#" wire:click.prevent="addToWishList('{{ $card->id }}')"
                                            class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                            title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                            href="#"
                                            class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                            title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                    </div>

                                </div>

                                <div class="prd-price">
                                    @if ($card->offer_price > 0)
                                        <div class="price-old">$ {{ $card->price }}</div>
                                        <div class="price-new">$
                                            {{ $card->price - $card->offer_price }}</div>
                                    @else
                                        <div class="price-new">$
                                            {{ $card->price }}</div>
                                    @endif

                                </div>

                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart"
                                                wire:click.prevent="addToCart('{{ $card->id }}')"
                                                data-product='{"name": "{{ $card->product_name }}", "path":"{{ asset('assets/cards/' . $card->firstMedia?->file_name) }}", "url":"{{ route('frontend.card', $card->slug) }}", "aspect_ratio":0.778}'>
                                                {{ __('panel.f_add_to_card') }}
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
