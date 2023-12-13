<div>
    <style>
        .cart-table {
            border: none;
        }

        .cart-table-prd {
            border: 1px solid #353136;
            border-radius: 10px;
        }

        /* paypal example  */




        .btn,
        button,
        [role=button],
        [type=submit] {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background-color: gray;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            display: inline-block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
        }

        .payment-method__title {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            min-height: 40px;
            width: 100%;
            padding-bottom: 5px;
        }

        .financial-institutes {
            display: inline-block;
            list-style: none;
            line-height: 0;
        }

        .financial-institutes__logo {
            display: inline-block;
            margin: 0 1px 5px 0;
        }

        .financial-institutes__logo img {
            width: auto;
        }

        .payment-method__tab[aria-selected='true'] {
            border-top: 6px solid #82b541;
            border-bottom-color: transparent !important;
            background-color: white;
            padding-top: 1px;
            z-index: 1;
        }
    </style>


    <div class="container">
        <h1 class="text-center">اكمال عملية الشراء</h1>

        <div class="row">
            <div class="col-sm-12 col-md-7">

                {{-- paypal example  --}}
                <form action="">
                    <div class="payment-method__tabs is-hidden-phone" role="tablist">
                        <button name="payment_key" type="submit" value="buy_now::braintree" role="tab"
                            aria-selected="false" class="payment-method__tab"
                            data-google-analytics-payment-method="credit_card">
                            <div class="payment-method__tab-inner">
                                <div class="payment-method__title">
                                    <ul id="braintree-gateway" class="financial-institutes">
                                        <li class="financial-institutes__logo">
                                            <img alt="Visa" title="Visa" width="48px" height="30px"
                                                src="https://public-assets.envato-static.com/assets/buying/financial-institutes/visa-ff2b9884b40ef2c079d8620dd1848376ae4ba0f99c63535039472fe7768a9e25.svg">
                                        </li>
                                        <li class="financial-institutes__logo">
                                            <img alt="MasterCard" title="MasterCard" width="48px" height="30px"
                                                src="https://public-assets.envato-static.com/assets/buying/financial-institutes/mastercard-182d740aebe28de6f54f8bbdc2db7e8a7878e23252ed6d1c8a3ab8b88bceafd0.svg">
                                        </li>
                                        <li class="financial-institutes__logo">
                                            <img alt="American Express" title="American Express" width="48px"
                                                height="30px"
                                                src="https://public-assets.envato-static.com/assets/buying/financial-institutes/amex-b313efc447ba27118380f680c8ad8101b722c594771831a091e75df0d476aa8d.svg">
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </button>

                        <button name="payment_key" type="submit" value="buy_now::paypal" role="tab"
                            aria-selected="true" class="payment-method__tab"
                            data-google-analytics-payment-method="paypal">
                            <div class="payment-method__tab-inner">
                                <div class="payment-method__title">
                                    <img alt="PayPal" width="95px" height="25px"
                                        src="https://public-assets.envato-static.com/assets/buying/paypal-logo-802cab56dfafa8b4bc682e9e4ba31ac076a0b6e520026fc397151baec13f3d36.svg">
                                </div>

                            </div>
                        </button>


                    </div>
                </form>

                {{-- paypal example  --}}


                {{-- start --}}
                <div class="card col-md-12 bg-transparent mt-2">

                    <div class="card-body">

                        <div class=" payment-method">
                            <h2>طريقة الدفع</h2>
                            <div class="form-group select-wrapper">
                                <select class="form-control js-payment-type form-control--sm rounded-pill"
                                    wire:model="payment_category_id">
                                    <option value="">اختر طريقة الدفع</option>

                                    @forelse ($payment_categories as $payment_category)
                                        <option value="{{ $payment_category->id }}"
                                            wire:click="updatePaymentCategory()">
                                            {{ $payment_category->name_ar }}
                                        </option>
                                    @empty
                                    @endforelse

                                </select>
                            </div>
                        </div>

                        @if (count($payment_methods) > 0)
                            <div class="payment-details mt-3">
                                <div class="payment-type-1 js-bank">
                                    <h3 class="custom-color">بيانات التحويل عبر
                                        {{ $payment_category_name_ar }}
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label> {{ $payment_category_name_ar }}</label>
                                            <div class="form-group select-wrapper">


                                                <select class="form-control js-banks form-control--sm rounded-pill"
                                                    wire:model="payment_method_id">
                                                    <option value="">اختر نوع
                                                        {{ $payment_category_name_ar }} الذي تم/ يتم
                                                        التحويل بواسطته</option>


                                                    @forelse ($payment_methods as $payment_method)
                                                        <option value="{{ $payment_method->id }}">
                                                            {{ $payment_method->method_name }}
                                                        </option>
                                                    @empty
                                                    @endforelse

                                                    {{-- <option value="987654321">مصرف الكريمي</option> --}}

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif

                        @forelse ($payment_method_details as $payment_method_detail)
                            {{-- {{ $payment_method_detail->method_name }} --}}

                            <div class="banks-details row mt-3">
                                <div class="bank-info-123456789 col-sm-12 mb-3">
                                    <div class="d-sm-flex flex-sm-row">
                                        <div class="col-md-4 col-sm-12">
                                            <img src="{{ asset('assets/payment_method_offlines/' . $payment_method_detail->firstMedia->file_name) }}"
                                                alt="{{ $payment_method_detail->name }}" class=" img-fluid rounded">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <h2 class="">بيانات التحويل عبر
                                                {{ $payment_method_detail->method_name }} </h2>
                                            <h3 class="custom-color">
                                                {{ $payment_method_detail->name }}</h3>
                                            <label>رقم {{ $payment_category_name_ar }}:</label>
                                            <div class="form-group">
                                                {{-- need to be change to number of bank --}}
                                                {{ $payment_method_detail->id }} </div>
                                            <label>اسم {{ $payment_category_name_ar }}:</label>
                                            <div class="form-group">
                                                {{ $payment_method_detail->owner_account_name }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="bank-123456789" name="bank"
                                        class="form-control form-control--sm rounded-pill " value="4">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>رقم الحساب البنكي للعميل</label>
                                    <div class="form-group">
                                        <input type="text" name="bankAccNumber"
                                            class="form-control form-control--sm rounded-pill"
                                            placeholder="رقم الحساب البنكي للعميل">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>صورة وصل التحويل</label>
                                    <div class="form-group">
                                        <input type="file" name="bankReceipt" id="bankReceipt"
                                            class="form-control form-control--sm rounded-pill">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-5">
                                    <button class="btn btn--full btn--md rounded-pill js-save-order"><span>اكمال
                                            عملية الشراء</span></button>
                                </div>
                            </div>

                        @empty
                        @endforelse

                    </div>
                </div>
                {{-- end --}}

            </div>

            {{-- سيكون الشعل علي ملخص الطلب هذا لعرض  بيانات المنتجات  --}}
            <div class="col-sm-12 col-md-5 pl-lg-8 mt-2 mt-md-0">
                <h2 class="custom-color">ملخص الطلب</h2>
                <div class="cart-table cart-table--sm pt-3 pt-md-0">


                    @forelse (Cart::content('default') as $item)
                        <div class="cart-table-prd mt-3">
                            <div class="cart-table-prd-image">
                                <a href="{{ route('frontend.card', $item->model?->slug) }}" class="prd-img"><img
                                        class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/cards/' . $item->model?->firstMedia->file_name) }}"
                                        alt="{{ $item->model?->name }}"></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <h2 class="cart-table-prd-name"><a
                                            href="{{ route('frontend.card', $item->model?->slug) }}">{{ $item->model?->name }}
                                        </a>
                                    </h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <input type="text" class="qty-input disabled" value="{{ $item->qty }}"
                                            data-min="0" data-max="1000">
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    ${{ $item->qty * $item->model?->price }}
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>

                {{-- coupon part  --}}
                <div class="mt-2"></div>
                <div class="card checkout">
                    <div class="card-body">


                        <form class="col-md-12" wire:submit.prevent="applyDiscount()">
                            <div class="form-inline mt-2">

                                @if (!session()->has('coupon'))
                                    <input type="text" wire:model="coupon_code"
                                        class="form-control form-control--sm col-md-12 card-discount-txt rounded-pill"
                                        placeholder="كود الخصم">
                                @endif

                                @if (session()->has('coupon'))
                                    <button type="button" wire:click.prevent="removeCoupon()"
                                        class="btn btn--full btn--md rounded-pill">

                                        حذف كوبون الخصم
                                    </button>
                                @else
                                    <button type="submit" class="btn col-4 col-sm-4 card-discount-btn rounded-pill">
                                        تطبيق
                                    </button>
                                @endif
                            </div>
                        </form>

                        @if (session()->has('coupon'))
                            <div class="d-flex mt-2">
                                <div class="col">اجمالي الخصم للكوبون (
                                    <small>{{ getNumbers()->get('discount_code') }}</small>
                                    )
                                </div>

                                <div class="col-auto  card-discount-price text-right">
                                    ${{ $cart_discount }}</div>
                            </div>
                        @endif

                        <div class="cart-total-sm mt-3">
                            <span>المجموع</span>
                            <span class="card-total-price">$ 494.00</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        {{-- start example  --}}


        {{-- end example --}}
    </div>
</div>
