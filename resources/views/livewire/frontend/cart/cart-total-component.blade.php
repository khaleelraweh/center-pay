<div class="panel-group  prd-block_accordion" id="productAccordion">

    @if ($cart_total != 0)

        {{-- الاجمالي  --}}
        <div class=" panel panel-default">
            <div class="panel-heading active">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">
                        {{ __('panel.f_subtotal') }}
                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse show">
                <div class="panel-body">
                    <div class="d-flex mt-4">
                        <div class="col ">{{ __('panel.f_total') }}</div>
                        <div class="col-auto js-price text-right">{{ currency_converter($cart_subtotal) }}

                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="col "> {{ __('panel.f_tax') }} </div>
                        <div class="col-auto js-price text-right">{{ currency_converter($cart_tax) }} </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- كود الخصم --}}
        <div class="panel">

            <div class="panel-heading active ">

                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">
                        {{ __('panel.f_discount_code') }}
                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>

            <div id="collapse2" class="panel-collapse collapse show">
                <div class="panel-body">

                    @if (session()->has('offer_discount'))
                        <div class="d-flex mt-2">
                            <div class="col">
                                {{ __('panel.f_total_admin_discount') }}
                            </div>

                            <div class="col-auto  card-discount-price text-right">
                                {{ currency_converter(getNumbers()->get('admin_discount')) }}</div>
                        </div>
                    @endif

                    <form wire:submit.prevent="applyDiscount()">

                        <div class="form-inline mt-2 d-flex">



                            @if (!session()->has('coupon'))
                                <input type="text" wire:model="coupon_code"
                                    class="form-control form-control--sm col-md-12 card-discount-txt rounded-pill"
                                    placeholder=" {{ __('panel.f_discount_code') }} ">
                            @endif

                            @if (session()->has('coupon'))
                                <button type="button" wire:click.prevent="removeCoupon()"
                                    class="btn btn--full btn--md rounded-pill">
                                    {{ __('panel.f_remove_coupon_code') }}
                                </button>
                            @else
                                <button type="submit" class="btn col-4 col-sm-4 card-discount-btn rounded-pill">
                                    {{ __('panel.f_applay') }}
                                </button>
                            @endif
                        </div>

                    </form>


                    @if (session()->has('coupon'))
                        <div class="d-flex mt-2">
                            <div class="col">
                                {{ __('panel.f_total_advertisment_discount') }}
                                (<small>{{ getNumbers()->get('discount_code') }} </small>)
                                :
                            </div>

                            <div class="col-auto  card-discount-price text-right">
                                {{ currency_converter($cart_discount) }}</div>
                        </div>
                    @endif


                    @if (session()->has('offer_discount') && session()->has('coupon'))
                        <div class="d-flex mt-2">
                            <div class="col">
                                {{ __('panel.f_total_discount') }}
                            </div>

                            <div class="col-auto  card-discount-price text-right">
                                {{ currency_converter(getNumbers()->get('admin_discount') + $cart_discount) }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        {{--  الاجمالي الكلي   --}}
        <div class="panel">
            <div class="panel-heading active">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">
                        {{ __('panel.f_total') }}
                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse show">
                <div class="panel-body">

                    <div class="d-flex mt-5">
                        <div class="col card-total-txt">{{ __('panel.f_total') }}</div>
                        <div class="col-auto card-total-price text-right">{{ currency_converter($cart_total) }}</div>
                    </div>

                </div>
            </div>
        </div>

        {{-- استكمال عملية الدفع --}}
        <div class="mt-2"></div>
        @if (Cart::instance('default')->count() > 0)
            <a href="{{ route('frontend.checkout') }}" id="js-login-frm" class="btn btn--full btn--md rounded-pill">
                <span>
                    {{ __('panel.f_complete_purchase') }}
                </span>
            </a>
        @endif
    @else
        {{-- سلة الشراء فارغة  --}}
        <div class="cart">
            <div class="card-body bg-transparent">
                <div class="minicart-empty-icon">
                    <i class="icon-shopping-bag" style="font-size: 100px;"></i>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262"
                        style="enable-background:new 0 0 306 262;" xml:space="preserve">
                        <path class="st0"
                            d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    @endif
</div>
