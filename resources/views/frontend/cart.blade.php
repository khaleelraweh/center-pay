@extends('layouts.app')
@section('style')
    <style>
        .footer-shop-info,
        .footer-shop-info .row,
        .panel-heading {
            /* background: #23232D !important; */
            background: #1E171B !important;
        }

        .qty-changer button,
        .qty-changer input[type='number'],
        .qty-changer input[type='text'] {
            background-color: transparent;
        }

        .quantity-choice {
            /* width: 100px; */
            border: 1px solid #ecedf6 !important;
            border-radius: 22.5px;
            color: #fff !important;
            font-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0 10px;
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                <li><span>السلة</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1> سلة التسوق</h1>
            </div>


            <div class="row">

                <div class="col-md-8 js-hide-empty">

                    {{-- عناصر سلة التسوق  --}}
                    @forelse (Cart::content('default') as $item)
                        {{--  show item in cart using livewire --}}
                        <livewire:frontend.cart.cart-item-component :item="$item->rowId" />
                    @empty
                        {{-- سلة الشراء فارغة  --}}
                        <div class="cart">
                            <div class="card-body bg-transparent">
                                <div class="minicart-empty-text text-center">
                                    <h1>سلة الشراء فارغة</h1>
                                </div>
                                <div class="minicart-empty-icon">
                                    <i class="icon-shopping-bag"></i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;"
                                        xml:space="preserve">
                                        <path class="st0"
                                            d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforelse

                    @if (Cart::instance('default')->count() > 0)
                        <div class="text-center mt-1"><a href="#"
                                class="btn btn--grey js-remove-all-product rounded-pill">الغاء
                                السلة</a>
                        </div>
                    @endif

                    {{-- wanted more section  --}}
                    <div class="d-none d-lg-block">
                        <div class="mt-4"></div>
                        <div class="holder">
                            <div class="container">
                                <div class="title-wrap text-center">
                                    <h2 class="h1-style">قد يعجبك ايضا</h2>
                                    <div class="carousel-arrows carousel-arrows--center"></div>
                                </div>
                                {{-- may want more   --}}
                                <livewire:frontend.cart.more-cards-component , :more_cards="$more_cards" />

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mt-3 mt-md-0 js-hide-empty">

                    <div class="text-center">
                        <h2>الإجمالي</h2>
                    </div>

                    {{-- call to card total panel --}}
                    <livewire:frontend.cart.cart-total-component />

                </div>



            </div>



        </div>
    </div>

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-trolley"></i>
                        </div>
                        <div class="text">
                            <h4>تسليم سريع للغاية</h4>
                            <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-currency"></i>
                        </div>
                        <div class="text">
                            <h4>افضل سعر</h4>
                            <p>
                                سنقوم بمطابقة أسعار المنتجات الرئيسية عبر الإنترنت والمحلية
                                المنافسين على الفور
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-diplom"></i>
                        </div>
                        <div class="text">
                            <h4>يضمن</h4>
                            <p>
                                إذا كان العنصر الذي تريده متاحًا، فيمكننا معالجة عملية الإرجاع
                                ووضع طلب جديد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
