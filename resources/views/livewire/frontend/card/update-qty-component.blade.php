<div>
    <div class="order-0 order-md-100">

        <div class="prd-block_actions prd-block_actions--wishlist">
            <div class="prd-block_qty">
                <div class="qty qty-changer bg-transparent">
                    <button wire:click="decreaseQuantity()" class="decrease js-qty-button"></button>
                    <input type="text" wire:model="quantity" class="qty-input" name="quantity">
                    <button wire:click="increaseQuantity()" class="increase js-qty-button"></button>
                </div>
            </div>


            <div class="btn-wrap">
                <form action="#">
                    <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart rounded-pill"
                        wire:click.prevent="store( 'default' , {{ $card->id }} , '{{ $card->product_name }}' , {{ $quantity }} , {{ $card->price }})"
                        data-product='{"name": "{{ $card->product_name }}", "path":"{{ asset('assets/cards/' . $card->firstMedia->file_name) }}", "url":"{{ route('frontend.card', $card->slug) }}", "aspect_ratio":0.778}'>
                        {{ __('panel.f_add_to_shopping_cart') }}
                    </button>
                </form>
            </div>

            <div class="btn-wishlist-wrap">
                <a href="#"
                    wire:click.prevent="store( 'wishlist' , {{ $card->id }} , '{{ $card->product_name }}' , {{ $quantity }} , {{ $card->price }})"
                    class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist"
                    title="{{ __('panel.f_add_to_wishlist') }}"><i class="icon-heart-stroke"></i></a>
                <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist"
                    title="{{ __('panel.f_remove_from_wishlist') }}"><i class="icon-heart-hover"></i></a>
            </div>
        </div>


    </div>
</div>
