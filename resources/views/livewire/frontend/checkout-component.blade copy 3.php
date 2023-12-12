<div>
    <div class="container">
        <h1 class="text-center">اكمال عملية الشراء</h1>

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="panel-group" id="checkoutAccordion">

                    <div class="panel panel-default">
                        <div class="panel-heading active">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#step1" data-parent="#checkoutAccordion">01. كود
                                    الخصم </a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="step1" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <div class="panel-body-inside">
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

                                                    حذف
                                                </button>
                                            @else
                                                <button type="submit"
                                                    class="btn col-4 col-sm-4 card-discount-btn rounded-pill">
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


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading active">

                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkoutAccordion" href="#step4">طريقة
                                    الدفع</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>

                        </div>

                        <div id="step4" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <div class="panel-body-inside">

                                    {{-- start --}}


                                    <div class="card col-md-12 bg-transparent">

                                        <div class="card-body">

                                            <div class=" payment-method">
                                                <h2>طريقة الدفع</h2>
                                                <div class="form-group select-wrapper">
                                                    <select
                                                        class="form-control js-payment-type form-control--sm rounded-pill"
                                                        wire:model="payment_category_id">
                                                        <option value="">اختر طريقة الدفع</option>

                                                        @forelse ($payment_categories as $payment_category)
                                                            <option value="{{ $payment_category->id }}"
                                                                wire:click="updatePaymentMethodOffline()"
                                                                {{ old('payment_category_id', $payment_category_id) == $payment_category->id ? 'selected' : null }}>
                                                                {{ $payment_category->name_ar }}
                                                            </option>
                                                        @empty
                                                        @endforelse

                                                    </select>
                                                </div>
                                            </div>


                                            @if ($payment_category_id != '')

                                                <div class="payment-details mt-3">
                                                    <div class="payment-type-1 js-bank">
                                                        <h3 class="custom-color">بيانات التحويل عبر الحساب البنكي
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>الحساب البنكي</label>
                                                                <div class="form-group select-wrapper">


                                                                    <select
                                                                        class="form-control js-banks form-control--sm rounded-pill"
                                                                        wire:model="payment_method_id">
                                                                        <option value="">اختبر نو ع الحساب
                                                                            البنكي
                                                                            الذي تم التحويل اليه</option>

                                                                        @forelse ($payment_methods as $payment_method)
                                                                            <option value="{{ $payment_method->id }}"
                                                                                wire:click=""
                                                                                {{ old('payment_method_id', $payment_method_id) == $payment_method->id ? 'selected' : null }}>
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








                                            <div class="payment-details d-none">
                                                <label>Cart Number</label>
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control--sm rounded-pill">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Month:</label>
                                                        <div class="form-group select-wrapper">
                                                            <select class="form-control form-control--sm rounded-pill">
                                                                <option selected="" value="1">January
                                                                </option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Year:</label>
                                                        <div class="form-group select-wrapper">
                                                            <select class="form-control form-control--sm rounded-pill">
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <label>CVV Code</label>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control--sm rounded-pill">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    {{-- end --}}









                                    <div class="mt-2"></div>
                                    <div class="clearfix mt-2">
                                        <button type="submit" class="btn btn--lg w-100"> اكمل عملية الدفع عبر
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
































            {{-- سيكون الشعل علي ملخص الطلب هذا لعرض  بيانات المنتجات  --}}
            <div class="col-sm-12 col-md-7 pl-lg-8 mt-2 mt-md-0">
                <h2 class="custom-color">ملخص الطلب</h2>
                <div class="cart-table cart-table--sm pt-3 pt-md-0">
                    <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                        <div class="cart-table-prd-image text-center">
                            صورة
                        </div>
                        <div class="cart-table-prd-content-wrap">
                            <div class="cart-table-prd-info">الاسم</div>
                            <div class="cart-table-prd-qty">الكمية</div>
                            <div class="cart-table-prd-price">السعر</div>
                        </div>
                    </div>

                    @forelse (Cart::content('default') as $item)
                        <div class="cart-table-prd">
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
                        <h3>Apply Promocode</h3>
                        <p>Got a promo code? Then you're a few randomly combined numbers & letters away from fab
                            savings!</p>
                        <div class="form-inline mt-2">
                            <input type="text" class="form-control form-control--sm"
                                placeholder="Promotion/Discount Code">
                            <button type="submit" class="btn">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="mt-2"></div>
                <div class="cart-total-sm">
                    <span>المجموع</span>
                    <span class="card-total-price">$ 494.00</span>
                </div>

            </div>

        </div>
    </div>
</div>
