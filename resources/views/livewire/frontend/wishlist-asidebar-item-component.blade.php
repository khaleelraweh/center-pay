<div>
    <div class="minicart-prd row">
        {{-- image part  --}}
        <div class="minicart-prd-image image-hover-scale-circle col">
            <a href="{{ route('frontend.card', $cartItem->model->slug) }}"><img class="lazyload fade-up"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    data-src="{{ asset('assets/cards/' . $cartItem->model?->firstMedia->file_name) }}"
                    alt="{{ $cartItem->model->name }}" /></a>
        </div>
        {{-- content part --}}
        <div class="minicart-prd-info col">
            <div class="minicart-prd-tag"><a
                    href="{{ route('frontend.card_category', $cartItem->model->category->slug) }}">{{ $cartItem->model->category->name }}</a>
            </div>
            <h2 class="minicart-prd-name">
                <a href="{{ route('frontend.card', $cartItem->model->slug) }}">{{ $cartItem->model->name }}
                </a>
            </h2>
            <div class="minicart-prd-qty">
                <span class="minicart-prd-qty-label">الكمية:</span>
                {{-- <span
                        class="minicart-prd-qty-value">{{ $cartItem->qty }}
                    </span> --}}
                <div class="quantity">
                    <strong> الكمية </strong>
                    <div class="quantity-choice">
                        <div class="qty qty-changer">
                            <button class="decrease" style="background: transparent;"
                                wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')">
                            </button>

                            <input type="text" class="qty-input" style="background: transparent"
                                value="{{ $item_quantity }} " data-min="0" data-max="1000">

                            <button style="background: transparent" class="increase"
                                wire:click="increaseQuantity('{{ $cartItem->rowId }}')">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="minicart-prd-price prd-price">
                <div class="price-old">$200.00</div>
                <div class="price-new">{{ $cartItem->model->price * $cartItem->qty }}</div>
            </div>
        </div>
        {{-- trash part --}}
        <div class="minicart-prd-action">
            <a href="#" class="js-product-remove" data-line-number="1"><i class="icon-recycle"></i></a>
        </div>
    </div>

</div>
