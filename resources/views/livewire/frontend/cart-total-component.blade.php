<div class="panel-group  prd-block_accordion" id="productAccordion">

    @if ($cart_total != 0)

        {{-- الاجمالي  --}}
        <div class=" panel panel-default">
            <div class="panel-heading active">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">الاجمالي

                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse show">
                <div class="panel-body">

                    <div class="d-flex mt-4">
                        <div class="col ">إجمالي المبلغ</div>
                        <div class="col-auto js-price text-right">${{ $cart_subtotal }} </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="col ">إجمالي الضريبة</div>
                        <div class="col-auto js-price text-right">${{ $cart_tax }} </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- كود الخصم --}}
        <div class="panel">
            <div class="panel-heading active ">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">كود
                        الخصم
                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse show">
                <div class="panel-body">

                    <div class="form-inline mt-2">
                        <input type="text"
                            class="form-control form-control--sm col-md-12 card-discount-txt rounded-pill"
                            placeholder="كود الخصم">
                        <button type="submit" class="btn col-4 col-sm-4 card-discount-btn rounded-pill">تطبيق</button>
                    </div>

                    @if (session()->has('coupon'))
                        <div class="d-flex mt-2">
                            <div class="col">اجمالي الخصم</div>
                            <div class="col-auto  card-discount-price text-right">- ${{ $cart_discount }}</div>
                        </div>
                    @endif



                </div>
            </div>
        </div>
        {{--  الاجمالي الكلي   --}}
        <div class="panel">
            <div class="panel-heading active">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">الاجمالي
                        الكلي

                    </a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse show">
                <div class="panel-body">

                    <div class="d-flex mt-5">
                        <div class="col card-total-txt">الإجمالي</div>
                        <div class="col-auto card-total-price text-right">${{ $cart_total }}</div>
                    </div>

                </div>
            </div>
        </div>

        {{-- استكمال عملية الدفع --}}
        <div class="mt-2"></div>
        @if (Cart::instance('default')->count() > 0)
            <a href="{{ route('frontend.checkout') }}" id="js-login-frm"
                class="btn btn--full btn--md rounded-pill"><span>استكمال
                    الدفع</span></a>
        @endif
    @else
        <li class="d-flex align-items-center justify-content-between mb-4">
            <span>Your Cart is empty</span>
        </li>
    @endif
</div>
