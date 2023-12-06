<div>
    <div class="cart">
        <div class="card-body bg-transparent">
            <div class="cart-item">
                <div class="item-body product">
                    <a class="item-img" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                        <img src="{{ asset('assets/cards/' . $cartItem->model?->firstMedia->file_name) }}"
                            class="img-fluid" alt="{{ $cartItem->model?->name }}">
                    </a>
                    <div class="item-text">
                        <h3 class="item-name">
                            <a class="item-name-anchor" href="{{ route('frontend.card', $cartItem->model?->slug) }}">
                                {{ $cartItem->model?->name }} </a>
                        </h3>
                        {{-- <a class="item-category" href="javascrip:void(0);">
                            شدات ببجي </a> --}}
                        <div class="cart-item-prices">
                            <span class="item-price" style="display: flex; align-items: center;">
                                السعر:
                                ${{ $cartItem->model?->price }}<span
                                    style="color: rgb(181, 181, 181); text-decoration: line-through; margin: 0px 5px;"></span>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="item-footer">
                    <button wire:click.prevent="removeFromCart('{{ $cartItem->rowId }}')" type="button" id="2"
                        class="item-delete js-item-delete" data-toggle="modal" data-target="#deleteConfirm"
                        title="حذف من السلة"><i class="icon-recycle"></i></button>
                    <div class="item-tools">
                        <div class="quantity">
                            <strong> الكمية </strong>
                            <div class="quantity-choice">
                                <div class="qty qty-changer">
                                    <button class="decrease"
                                        wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')"></button>
                                    <input type="text" class="qty-input" value="{{ $item_quantity }} " data-min="0"
                                        data-max="1000">
                                    <button class="increase"
                                        wire:click="increaseQuantity('{{ $cartItem->rowId }}')"></button>
                                </div>
                            </div>
                        </div>

                        <div class="final-price" id="final-price-2">${{ $cartItem->qty * $cartItem->model?->price }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
