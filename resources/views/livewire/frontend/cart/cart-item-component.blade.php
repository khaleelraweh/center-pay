<div x-data="{ open: true }" x-show="open">
    {{-- <div class="cart"> --}}
    <div class="cart-table-prd custom-padding-0">
        <div class="card-body bg-transparent">
            <div class="cart-item">
                <div class="item-body product">
                    <a class="item-img" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                        <img src="{{ asset('assets/cards/' . $cartItem->model?->firstMedia->file_name) }}"
                            class="img-fluid" alt="{{ $cartItem->model?->product_name }}">
                    </a>
                    <div class="item-text">
                        <h3 class="item-name">
                            <a class="item-name-anchor" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                                {{ $cartItem->model?->product_name }} </a>
                        </h3>
                        <a class="item-category" href="javascrip:void(0);">
                            {{ $cartItem->model?->category->category_name }} </a>
                        <div class="cart-item-prices">
                            <span class="item-price" style="display: flex; align-items: center;">
                                {{ __('panel.price') }}:
                                {{ currency_converter($cartItem->model?->price) }}<span
                                    style="color: rgb(181, 181, 181); text-decoration: line-through; margin: 0px 5px;"></span>
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

                        <div class="final-price" id="final-price-2">
                            {{ currency_converter($cartItem->qty * $cartItem->model?->price) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
