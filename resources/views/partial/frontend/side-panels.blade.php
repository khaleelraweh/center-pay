<div class="header-side-panel">

    <!-- القائمة الجانبية عرض روابط الصفحة في الموبايل   -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">{{ __('panel.f_close') }}</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        {{-- <a href="#" class="nav-viewall">عرض الكل</a> --}}
                    </div>


                    <ul class="nav nav-level-1">
                        @foreach ($user_side_menu as $menu)

                            @if (count($menu->appearedChildren) == false)
                                {{-- عرض العنصر الرئيسي الذي ليس له ابناء  --}}
                                <li>
                                    <a href="{{ $menu->link != null ? url($menu->link) : '#' }}">
                                        {{ $menu->title }}
                                    </a>
                                </li>
                            @else
                                {{-- عرض العنصر الرئيسي الذي لديه ابناء  --}}
                                <li>
                                    <a href="javascript: void(0);">
                                        {{ $menu->title }}

                                        <span class="arrow">
                                            {{-- <i class="icon-angle-right"></i><!-- right in english  --> --}}
                                            <i class="icon-angle-left"></i>
                                        </span>
                                    </a>

                                    @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                        <ul class="nav-level-2">
                                            @foreach ($menu->appearedChildren as $sub_menu)
                                                <li>
                                                    <a
                                                        href="{{ $sub_menu->link != null ? url($sub_menu->link) : '#' }}">
                                                        {{ $sub_menu->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif


                                </li>
                            @endif
                        @endforeach

                    </ul>






                </div>

                <div class="mobilemenu-bottom">
                    <div class="mobilemenu-currency">
                        <div class="dropdn_currency">
                            <div class="dropdn dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link">دولار امريكي<i
                                        class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active">
                                            <a href="#"><span>دولار امريكي</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>يورو</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>باند امريكي</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobilemenu-language">
                        <div class="dropdn_language">
                            <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link"><span
                                        class="js-dropdn-select-current">العربية</span><i
                                        class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active">
                                            <a href="#"><img src="{{ asset('frontend/images/flags/en.webp') }}"
                                                    alt="" />الانجليزية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/sp.webp') }}"
                                                    alt="" />الاسبانية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/de.webp') }}"
                                                    alt="" />الالمانية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/fr.webp') }}"
                                                    alt="" />الفرنسية</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- القائمة الجانبية تسجيل الدخول   -->
    @guest
        <!-- القائمة الجانبية تسجيل الدخول   -->
        {{-- <div class="dropdn-content account-drop {{ request()->routeIs('login') ? 'is-opened' : null }}" id="dropdnAccount"> --}}
        <div class="dropdn-content account-drop" id="dropdnAccount">
            <div class="dropdn-content-block">
                <div class="dropdn-close">
                    <span class="js-dropdn-close">{{ __('panel.f_close') }}</span>
                </div>
                <ul>
                    <li>
                        <div class="mb-4">
                            <img srcset="
                                    {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                                alt="{{ __('panel.f_center_pay') }}" width="200">
                        </div>
                    </li>
                    <li>
                        <!-- <a href="account-create.html"> -->
                        <h5>
                            <i class="icon-login custom-color"></i>
                            <span>{{ __('panel.f_login') }}</span>
                        </h5>
                        <!-- </a> -->
                    </li>
                    <li>
                        <h6 class="small-body-subtitle">
                            {{ __('panel.f_new_user') }} !
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                                data-panel="#dropdnSignUp">
                                <!-- <i class="icon-user"></i> -->
                                <span class="main-color"> {{ __('panel.f_add_new_account') }} {{ __('panel.f_now') }}
                                </span>
                            </a>
                        </h6>
                    </li>

                    <li>
                        <!-- <a href="checkout.html"><span>الدفع</span><i class="icon-card"></i></a> -->
                    </li>
                </ul>
                <div class="dropdn-form-wrapper">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">

                            <div class="form-group">
                                {{-- <label for="email">Email Address</label> --}}
                                <input type="text" name="email"
                                    class="form-control form-control--sm js_email_fe rounded-pill @if ($errors->has('email') || $errors->has('username')) has-error @endif"
                                    placeholder="{{ __('panel.f_enter') }} {{ __('panel.f_user_name') }}  {{ __('panel.or') }} {{ __('panel.f_user_email') }}"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email') || $errors->has('username'))
                                    <span class="help">{{ $errors->first('email') }}
                                        {{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <!-- <div class="invalid-feedback">لا يكون الحقل فارغ</div> -->
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" required autocomplete="current-password"
                                class="form-control form-control--sm js_email_fe rounded-pill"
                                placeholder="{{ __('panel.f_enter') }} {{ __('panel.f_user_password') }}" />

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- <div class="invalid-feedback">لا يكون الحقل فارغ</div> -->
                        </div>

                        <button type="submit" class="btn mt-3 col-sm-12 rounded-pill js-login-btn">
                            {{ __('panel.f_login') }} </button>

                        {{-- <div class="mt-3">
                            @if (Route::has('password.request'))
                                <a class="  " href="{{ route('password.request') }}">
                                    {{ __('panel.f_forgot_password') }}
                                </a>
                            @endif
                        </div> --}}

                        <div class="mt-3">
                            <h6 class="small-body-subtitle">
                                <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                                    data-panel="#dropdnForgotPassword">
                                    <span class="main-color"> {{ __('panel.f_forgot_password') }} </span>
                                </a>
                            </h6>
                        </div>

                    </form>
                </div>
            </div>
            <div class="drop-overlay js-dropdn-close"></div>
        </div>
    @else
        <div class="dropdn-content account-drop" id="dropdnAccount">
            <div class="dropdn-content-block">
                <div class="dropdn-close">
                    <span class="js-dropdn-close">اغلاق</span>
                </div>
                <ul>
                    <li>
                        <div class="mb-4">
                            <img srcset="
                                {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                                {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                                alt="{{ __('panel.center_pay') }}" width="200">
                        </div>
                    </li>
                    <li>
                        <h5>
                            <i class="icon-user"></i>
                            <span> {{ __('panel.f_profile') }} </span>
                        </h5>
                    </li>

                    <li>
                        <h6>
                            <span>{{ __('panel.f_welcome') }} : </span>
                            @if (auth()->user()->full_name != null)
                                <span class="custom-color">{{ auth()->user()?->full_name }}</span>
                            @endif

                            @if (auth()->user()->email_verified_at != null)
                            @else
                                <div class="mt-4">

                                    <h5 class=" mb-3"> {{ __('panel.f_insure_user_email') }} </h5>

                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert"
                                            style="margin-bottom: 5px ; background-color:rgba(200 , 100 , 100,0.3) ; border-radius: 10px">
                                            {{ __('panel.f_we_sent_link_insurent_to_your_email') }}
                                        </div>
                                    @endif

                                    {{ __('panel.f_before_start_check_email_to_continue') }}
                                    <br> <br>
                                    {{ __('panel.f_if_you_didnt_receive_an_email') }},

                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 px-1 py-1 m-0 align-baseline"
                                            style="border-radius: 5px"> {{ __('panel.f_click_here_to_get_another') }}
                                        </button>.
                                    </form>
                                </div>
                            @endif

                        </h6>
                    </li>

                    @if (auth()->user()->email_verified_at != null)
                        <li>
                            <div class="card mt-0 border-0  p-lg-2 custom-card main-back-color" style="padding: 0px">
                                <div class="card-body custom-card-body-rounded second-back-color">
                                    <h5 class="text-uppercase mb-4"> {{ __('panel.f_content') }} </h5>



                                    @if (auth()->user()->roles->first()->allowed_route != '')
                                        <div class=" custom-nav-item">
                                            <a href="{{ route('admin.index') }}">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_control_panel') }}
                                                </strong>
                                            </a>
                                        </div>

                                        <div class=" custom-nav-item">
                                            <a href="{{ route('admin.account_settings') }}">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_user_profile') }}
                                                </strong>
                                            </a>
                                        </div>

                                        <div class=" custom-nav-item">
                                            <a href="javascript:void(0);"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_logout') }}
                                                </strong>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        {{-- <div
                                            class=" custom-nav-item {{ Route::currentRouteName() == 'customer.dashboard' ? 'active text-white' : 'p ?>' }}  ">
                                            <a href="{{ route('customer.dashboard') }}">
                                                <strong class="small text-uppercase font-weight-bold">لوحة التحكم
                                                    الرئيسية</strong>
                                            </a>
                                        </div> --}}

                                        <div
                                            class=" custom-nav-item {{ Route::currentRouteName() == 'customer.profile' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.profile') }}">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_user_profile') }}
                                                </strong>
                                            </a>
                                        </div>

                                        <div
                                            class=" custom-nav-item {{ Route::currentRouteName() == 'customer.addresses' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.addresses') }}">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_user_addresses') }}
                                                </strong>
                                            </a>
                                        </div>

                                        <div
                                            class=" custom-nav-item {{ Route::currentRouteName() == 'customer.orders' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.orders') }}">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_my_orders') }}
                                                </strong>
                                            </a>
                                        </div>

                                        <div class=" custom-nav-item">
                                            <a href="javascript:void(0);"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <strong class="small text-uppercase font-weight-bold">
                                                    {{ __('panel.f_logout') }}
                                                </strong>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @else
                    @endif

                </ul>

            </div>
            <div class="drop-overlay js-dropdn-close"></div>
        </div>
    @endguest

    {{-- fotgot password  --}}
    <div class="dropdn-content account-drop" id="dropdnForgotPassword">
        <div class="dropdn-content-block">
            <div class="dropdn-close">
                <span class="js-dropdn-close">{{ __('panel.f_close') }}</span>
            </div>
            <ul>
                <li>
                    <div class="mb-4">
                        <img srcset="
                                {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                                {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                            alt="{{ __('panel.f_center_pay') }}" width="200">
                    </div>
                </li>
                <li>
                    <h5>
                        <i class="icon-login custom-color"></i>
                        <span> {{ __('panel.f_reset_password') }} <span>
                    </h5>
                </li>
            </ul>
            <div class="dropdn-form-wrapper">

                <div class="row">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success"
                                style="margin-bottom: 5px ; background-color:rgba(200 , 100 , 100,0.3) ; border-radius: 10px"
                                role="alert">
                                <div class="d-none">{{ session('status') }}</div>
                                {{ __('panel.f_we_have_sent_you_a_reset_link_to_your_email') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group js_login_fe">
                                <p class="form-row mb-3">

                                    <label for="email">
                                        <i class="fa fa-envelope custom-color"></i>
                                        {{ __('panel.f_email') }}
                                        <span class="required">*</span>
                                    </label>

                                    <input type="email" name="email" id="email"
                                        class="form-control form-control--sm rounded-pill" value=""
                                        placeholder="your@email.com" autocomplete="email" autocapitalize="none">

                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </p>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn mt-3 col-sm-12 rounded-pill ">
                                        {{ __('panel.f_send_reset_link') }}
                                    </button>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>


    <!-- القائمة الجانبية إنشاء حساب جديد -->
    <div class="dropdn-content signup-drop " id="dropdnSignUp">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">{{ __('panel.close') }}</span></div>
            <div id="js_signup_panel" class="dropdn-form-wrapper">
                <div class="mb-4">
                    <img srcset="
                    {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                        alt="{{ __('panel.f_center_pay') }}" width="200">
                </div>
                <h5><i class="fa fa-sign-in custom-color"></i> {{ __('panel.f_register') }} </h5>
                <h6 class="small-body-subtitle"> {{ __('panel.f_do_you_have_an_account') }}
                    <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                        data-panel="#dropdnAccount">
                        <span class="main-color"> {{ __('panel.f_login') }} </span>
                    </a>
                </h6>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="first_name">
                                <i class="fa fa-user custom-color"></i>
                                {{ __('panel.first_name') }}
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="first_name" id="first_name"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.first_name') }}">

                            @error('first_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="last_name">
                                <i class="fa fa-user custom-color"></i>
                                {{ __('panel.last_name') }}
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="last_name" id="last_name"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.last_name') }}">

                            @error('last_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="username">
                                <i class="fa fa-user custom-color"></i>
                                {{ __('panel.user_name') }}
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="username" id="username"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.user_name') }}">

                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="email">
                                <i class="fa fa-envelope custom-color"></i>
                                {{ __('panel.f_user_email') }} <span class="required">*</span>
                            </label>

                            <input type="email" name="email" id="email"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="your@email.com" autocomplete="email" autocapitalize="none">

                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">
                            <label for="CustomerCountry">
                                <i class="fa fa-flag custom-color"></i>
                                {{ __('panel.country') }}
                                <span class="required">*</span>
                            </label>
                            <select class="select-wrapper rounded-pill" id="CustomerCountry" name="Country">
                                <option value="8">+967 - اليمن</option>
                                <option value="1">+966 - السعودية</option>
                                <option value="2">+971 - الامارات</option>
                                <option value="3">+965 - الكويت</option>
                                <option value="4">+974 - قطر</option>
                            </select>
                        </p>

                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="mobile">
                                <i class="fa fa-mobile-phone custom-color"></i>
                                {{ __('panel.f_phone_number') }}
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="mobile" id="mobile"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.f_phone_number') }}">
                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="password">
                                <i class="fa fa-user custom-color"></i>
                                {{ __('panel.f_user_password') }}
                                <span class="required">*</span>
                            </label>

                            <input type="password" name="password" id="password"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.f_password') }}">

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="password_confirmation">
                                <i class="fa fa-user custom-color"></i>
                                {{ __('panel.f_confirm_password') }}
                                <span class="required">*</span>
                            </label>

                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="{{ __('panel.f_confirm_password') }}">

                            @error('password_confirmation')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-3 col-sm-12 rounded-pill js-signup-btn">
                            {{ __('panel.f_register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>

    <!-- القائمة الجانبية قائمة المفضلات -->
    @livewire('frontend.carts-side-panel.cart-wishlist-component')

    <!-- القائمة الجانبية سلة الشراء  -->
    @livewire('frontend.carts-side-panel.cart-default-component')

</div>
