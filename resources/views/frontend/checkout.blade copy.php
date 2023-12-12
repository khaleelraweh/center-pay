@extends('layouts.app')

@section('style')
    <style>
        .card.checkout {
            background-color: #23232D;
        }

        .qty-changer input[type='number'],
        .qty-changer input[type='text'] {
            background: transparent;
        }
    </style>
@endsection


@section('content')
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                    <li><span>اكمال عملية الشراء </span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <h1 class="text-center">اكمال عملية الشراء</h1>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="panel-group" id="checkoutAccordion">
                            <div class="panel panel-default">
                                <div class="panel-heading active">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#step1">01. عناوين الشحن</a>
                                        <span class="toggle-arrow"><span></span><span></span></span>
                                    </h4>
                                </div>
                                <div id="step1" data-parent="#checkoutAccordion" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="panel-body-inside">
                                            <p><a href="account-create.html">تسجيل الدخول</a> او <a
                                                    href="account-create.html">انشاء حساب</a> لعملية شراء اسرع</p>
                                            <div class="row mt-2">
                                                <div class="col-sm-6">
                                                    <label>الاسم الاول:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>الاسم الثاني:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>الدولة:</label>
                                            <div class="form-group select-wrapper">
                                                <select class="form-control form-control--sm">
                                                    <option value="United States">الولايات المتحدة</option>
                                                    <option value="Canada">كنداء</option>
                                                    <option value="China">China</option>
                                                    <option value="India">India</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Mexico">Mexico</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>المقاطعة:</label>
                                                    <div class="form-group select-wrapper">
                                                        <select class="form-control form-control--sm">
                                                            <option value="AL">الامبيا</option>
                                                            <option value="AK">الاسكا</option>
                                                            <option value="AZ">Arizona</option>
                                                            <option value="AR">Arkansas</option>
                                                            <option value="CA">California</option>
                                                            <option value="CO">Colorado</option>
                                                            <option value="CT">Connecticut</option>
                                                            <option value="DE">Delaware</option>
                                                            <option value="DC">District Of Columbia</option>
                                                            <option value="FL">Florida</option>
                                                            <option value="GA">Georgia</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="ID">Idaho</option>
                                                            <option value="IL">Illinois</option>
                                                            <option value="IN">Indiana</option>
                                                            <option value="IA">Iowa</option>
                                                            <option value="KS">Kansas</option>
                                                            <option value="KY">Kentucky</option>
                                                            <option value="LA">Louisiana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>zip/postal code:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>العنوان 1:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm">
                                            </div>
                                            <div class="clearfix">
                                                <input id="formcheckoutCheckbox1" name="checkbox1" type="checkbox">
                                                <label for="formcheckoutCheckbox1">اضف العنوان الى حسابي</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#step2">02. عنوان الوصول للفاتورة </a>
                                        <span class="toggle-arrow"><span></span><span></span></span>
                                    </h4>
                                </div>
                                <div id="step2" data-parent="#checkoutAccordion" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="panel-body-inside">
                                            <div class="clearfix">
                                                <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">
                                                <label for="formcheckoutCheckbox2">نفس عنوان الشحن</label>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>الدولة:</label>
                                            <div class="form-group select-wrapper">
                                                <select class="form-control form-control--sm">
                                                    <option value="United States">الولايات المتحدة</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="China">China</option>
                                                    <option value="India">India</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Mexico">Mexico</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>المقاطعة:</label>
                                                    <div class="form-group select-wrapper">
                                                        <select class="form-control form-control--sm">
                                                            <option value="AL">الاسكا</option>
                                                            <option value="AK">الباني</option>
                                                            <option value="AZ">Arizona</option>
                                                            <option value="AR">Arkansas</option>
                                                            <option value="CA">California</option>
                                                            <option value="CO">Colorado</option>
                                                            <option value="CT">Connecticut</option>
                                                            <option value="DE">Delaware</option>
                                                            <option value="DC">District Of Columbia</option>
                                                            <option value="FL">Florida</option>
                                                            <option value="GA">Georgia</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="ID">Idaho</option>
                                                            <option value="IL">Illinois</option>
                                                            <option value="IN">Indiana</option>
                                                            <option value="IA">Iowa</option>
                                                            <option value="KS">Kansas</option>
                                                            <option value="KY">Kentucky</option>
                                                            <option value="LA">Louisiana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>zip/postal code:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control--sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>العنوان 1:</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#step3">03. طرق التسليم</a>
                                        <span class="toggle-arrow"><span></span><span></span></span>
                                    </h4>
                                </div>
                                <div id="step3" data-parent="#checkoutAccordion" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="panel-body-inside">
                                            <div class="clearfix">
                                                <input id="formcheckoutRadio1" value="" name="radio1"
                                                    type="radio" class="radio" checked="checked">
                                                <label for="formcheckoutRadio1">التسليم العادي $2.99 (3-5 يوم)</label>
                                            </div>
                                            <div class="clearfix">
                                                <input id="formcheckoutRadio2" value="" name="radio1"
                                                    type="radio" class="radio">
                                                <label for="formcheckoutRadio2">التسليم السريع $10.99 (1-2 يوم)</label>
                                            </div>
                                            <div class="clearfix">
                                                <input id="formcheckoutRadio3" value="" name="radio1"
                                                    type="radio" class="radio">
                                                <label for="formcheckoutRadio3">نفس البوم $20.00 (التسليم المسائي)</label>
                                            </div>
                                            <div class="text-right">
                                                <button type="button"
                                                    class="btn btn-sm step-next-accordion">اكمل</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#step4">04. طريقة الدفع</a>
                                        <span class="toggle-arrow"><span></span><span></span></span>
                                    </h4>
                                </div>
                                <div id="step4" data-parent="#checkoutAccordion" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="panel-body-inside">
                                            <div class="clearfix">
                                                <input id="formcheckoutRadio4" value="" name="radio2"
                                                    type="radio" class="radio" checked="checked">
                                                <label for="formcheckoutRadio4">Credit Card</label>
                                            </div>
                                            <div class="clearfix">
                                                <input id="formcheckoutRadio5" value="" name="radio2"
                                                    type="radio" class="radio">
                                                <label for="formcheckoutRadio5">Paypal</label>
                                            </div>
                                            <div class="mt-2"></div>
                                            <label>رقم البطاقة</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control--sm">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>الشهر:</label>
                                                    <div class="form-group select-wrapper">
                                                        <select class="form-control form-control--sm">
                                                            <option selected value='1'>January</option>
                                                            <option value='2'>February</option>
                                                            <option value='3'>March</option>
                                                            <option value='4'>April</option>
                                                            <option value='5'>May</option>
                                                            <option value='6'>June</option>
                                                            <option value='7'>July</option>
                                                            <option value='8'>August</option>
                                                            <option value='9'>September</option>
                                                            <option value='10'>October</option>
                                                            <option value='11'>November</option>
                                                            <option value='12'>December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>السنة:</label>
                                                    <div class="form-group select-wrapper">
                                                        <select class="form-control form-control--sm">
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
                                                <label>الرقم الوطني</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control--sm">
                                                </div>
                                            </div>
                                            <div class="clearfix mt-2">
                                                <button type="submit" class="btn btn--lg w-100">مكان التسليم</button>
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
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="#" class="prd-img"><img class="lazyload fade-up"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('frontend/images/temp/1.webp') }}" alt=""></a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a href="product.html">Leather Pegged Pants</a>
                                        </h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <input type="text" class="qty-input disabled" value="2"
                                                data-min="0" data-max="1000">
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        $352.00
                                    </div>
                                </div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="#" class="prd-img"><img class="lazyload fade-up"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('frontend/images/temp/1.webp') }}" alt=""></a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual Shirt</a>
                                        </h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <input type="text" class="qty-input disabled" value="2"
                                                data-min="0" data-max="1000">
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        $142.00
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="mt-2"></div>
                        <div class="card checkout">
                            <div class="card-body">
                                <h3>Order Comment</h3>
                                <textarea class="form-control form-control--sm textarea--height-100" placeholder="Place your comment here"></textarea>
                                <div class="card-text-info mt-2">
                                    <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
