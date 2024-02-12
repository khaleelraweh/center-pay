<div x-data="{ open: true }" x-show="open">
    {{-- <div class="cart"> --}}
    <div class="cart-table-prd ">
        <div class="card-body bg-transparent">
            <div class="cart-item">
                <div class="item-body product custom-product-cart">
                    <a class="item-img" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                        <img src="{{ asset('assets/cards/' . $cartItem->model?->firstMedia->file_name) }}"
                            class="img-fluid" alt="{{ $cartItem->model?->product_name }}">
                    </a>
                    <div class="item-text mt-1 mt-1 mt-sm-2">
                        <h3 class="item-name">
                            <a class="item-name-anchor" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                                {{ $cartItem->model?->product_name }} </a>
                        </h3>
                        <a class="item-category" href="javascrip:void(0);">
                            {{ $cartItem->model?->category->category_name }} </a>
                        <div class="d-flex mt-1 ">

                            <span class="item-price">
                                {{ __('panel.price') }}:
                                @if ($cartItem->model->offer_price > 0)
                                    <div class="custom-old-price d-none d-sm-block px-2">
                                        {{ currency_converter($cartItem->model->price) }}</div>
                                    <div class="price-new custom-new-price px-1">
                                        {{ currency_converter($cartItem->model->price - $cartItem->model->offer_price) }}
                                    </div>
                                @else
                                    <div class="price-new custom-new-price px-2">
                                        {{ currency_converter($cartItem->model->price) }}</div>
                                @endif
                            </span>

                        </div>

                    </div>
                </div>
                <div class="item-footer">

                    <a wire:click.prevent="removeFromCart('{{ $cartItem->rowId }}')" x-on:click="open = ! open"
                        class="item-delete js-item-delete" title="{{ __('panel.f_remove_from_cart') }}">
                        <i class="icon-recycle"></i>
                    </a>

                    <div class="item-tools">
                        <div class="quantity">
                            <strong> {{ __('panel.f_quentity') }} </strong>
                            <div class="quantity-choice">
                                <div class="qty qty-changer">
                                    <button class="decrease"
                                        wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')"></button>
                                    <div class="qty-input px-3">{{ $item_quantity }}</div>
                                    <button class="increase"
                                        wire:click="increaseQuantity('{{ $cartItem->rowId }}')"></button>
                                </div>
                            </div>
                        </div>

                        <div class="final-price d-flex" id="final-price-2">
                            {{-- {{ currency_converter($cartItem->qty * $cartItem->model?->price) }} --}}
                            @if ($cartItem->model->offer_price > 0)
                                <div class="custom-old-price px-1">
                                    {{ currency_converter($cartItem->model->price * $cartItem->qty) }} </div>

                                <div class="price-new custom-new-price px-1">
                                    {{ currency_converter($cartItem->model->price * $cartItem->qty - $cartItem->model->offer_price * $cartItem->qty) }}
                                </div>
                            @else
                                <div class="price-new custom-new-price px-1">
                                    {{ currency_converter($cartItem->model->price * $cartItem->qty) }} </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
