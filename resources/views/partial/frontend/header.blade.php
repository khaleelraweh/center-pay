<?php $currentPath = Route::currentRouteName(); ?>
{{-- <header class="hdr-wrap {{ request()->routeIs('frontend.index') ? 'hdr-transparent' : null }}"> --}}
<header class="hdr-wrap">

    <div class="hdr-content hdr-content-sticky">
        <div class="container">
            <div class="row">
                <div class="col-auto show-mobile">
                    <div class="menu-toggle">
                        <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                    </div>
                </div>
                <div class="col-auto hdr-logo">
                    <a href="{{ route('frontend.index') }}" class="logo"><img
                            srcset="
                  {{ asset('frontend/images/games/logo-games.webp') }}   1x,
                  {{ asset('frontend/images/games/logo-games2x.webp') }} 2x
                "
                            alt="Logo" /></a>
                </div>
                <div class="hdr-nav hide-mobile nav-holder-s"></div>
                <div class="hdr-links-wrap col-auto ml-auto">
                    <div class="hdr-inline-link">
                        <div class="search_container_desktop">
                            <div class="dropdn dropdn_search dropdn_fullwidth">
                                <a href="#" class="dropdn-link js-dropdn-link only-icon"><i
                                        class="icon-search"></i><span class="dropdn-link-txt">بحث عن</span></a>
                                <div class="dropdn-content">
                                    <div class="container">
                                        <form method="get" action="#" class="search search-off-popular">
                                            <input name="search" type="text" class="search-input input-empty"
                                                placeholder="ما الذي تريد البحث عنه؟" />
                                            <button type="submit" class="search-button">
                                                <i class="icon-search"></i>
                                            </button>
                                            <a href="#" class="search-close js-dropdn-close"><i
                                                    class="icon-close-thin"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdn dropdn_account dropdn_fullheight">
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                                data-panel="#dropdnAccount"><i class="icon-user"></i><span
                                    class="dropdn-link-txt">حسابي</span></a>
                        </div>
                        {{-- call to cart component livewire for cart and wishlist counter --}}
                        <livewire:frontend.cart-component />

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hdr hdr-style5">
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <div class="menu-toggle">
                            <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                        </div>
                    </div>
                    <div class="col-auto hdr-logo">
                        <a href="{{ route('frontend.index') }}" class="logo"><img
                                srcset="
                    {{ asset('frontend/images/games/logo-games.webp ') }}  1x,
                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x
                  "
                                alt="سنتر باي" /></a>
                    </div>

                    {{-- links in the head of the index page frontend section  --}}
                    <div class="hdr-nav hide-mobile nav-holder">

                        <ul class="mmenu mmenu-js">

                            {{-- start test --}}
                            @foreach ($user_side_menu as $menu)

                                {{-- check if the link is single link  --}}
                                @if (count($menu->appearedChildren) == false)
                                    <li class="mmenu-item--simple">
                                        <a href="{{ $menu->link != null ? url($menu->link) : '#' }}" class="active">
                                            {{-- {{ dd($user_side_menu) }} --}}
                                            <span>{{ $menu->title }}</span>
                                        </a>
                                    </li>
                                @else
                                    {{-- sup menu title --}}

                                    <li class="mmenu-item--simple">

                                        <a href="javascript: void(0);">{{ $menu->title }}</a>

                                        @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                            <div class="mmenu-submenu">
                                                <ul class="submenu-list">

                                                    @foreach ($menu->appearedChildren as $sub_menu)
                                                        <li>
                                                            {{-- <a href="{{ url($sub_menu->link) }}"> --}}
                                                            <a
                                                                href="{{ $sub_menu->link != null ? url($sub_menu->link) : '#' }}">
                                                                {{ $sub_menu->title }}
                                                            </a>

                                                        </li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                        @endif

                                    </li>
                                @endif
                            @endforeach
                            {{-- end test --}}
                        </ul>

                    </div>


                    <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-group-link hide-mobile">
                            <div class="hdr-inline-link">
                                <div class="dropdn_language">
                                    <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                        <a href="#" class="dropdn-link js-dropdn-link">
                                            <span class="js-dropdn-select-current mainBtnLang">

                                                {{ __('panel.' . config('locales.languages')[app()->getLocale()]['lang']) }}
                                            </span>
                                            <i class="icon-angle-down"></i>
                                        </a>
                                        <div class="dropdn-content">
                                            <ul>

                                                @foreach (config('locales.languages') as $key => $val)
                                                    @if ($key != app()->getLocale())
                                                        <li>
                                                            <a href="{{ route('change.language', $key) }}" data-reload
                                                                class="mylang" onclick="setLanguageStyle('english');"
                                                                title="english">
                                                                <img src="{{ asset('frontend/images/flags/en.webp') }}"
                                                                    alt="" />
                                                                {{-- {{ $val['name'] }} --}}
                                                                {{ __('panel.' . $val['lang']) }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="dropdn_currency">
                                    <div class="dropdn dropdn_caret">

                                        @php
                                            // came from even (AppServiceProvider:boot(on first load ) or LocaleController:switch(on change language ) or CurrenciesController:currencyLoad(on Currency change ))
                                            $currency_code = session('currency_code');
                                            $currency_symbol = session('currency_symbol');
                                            $currency_name = session('currency_name');
                                        @endphp
                                        {{-- for chosed item --}}
                                        <a href="#" class="dropdn-link js-dropdn-link">
                                            {{ Str::title($currency_name) }}
                                            <i class="icon-angle-down"></i>
                                        </a>

                                        <div class="dropdn-content">
                                            <ul>
                                                @forelse (\App\Models\Currency::where('status',1)->get() as $currency)
                                                    {{--  to show non choosen items --}}
                                                    @if ($currency['currency_code'] != $currency_code)
                                                        <li
                                                            class="{{ $currency['currency_code'] == $currency_code ? 'active' : '' }}">
                                                            <a href="javascript:;"
                                                                onclick="currency_change('{{ $currency['currency_code'] }}');">
                                                                <span style="font-size: 12px">
                                                                    {{ Str::title($currency->currency_name) }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endif

                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hdr-inline-link">


                            {{-- will be used in frontend index  --}}

                            <form action="{{ route('admin.create_update_theme') }}" method="post" class="d-flex">
                                @csrf
                                <label for="theme" class="dropdn-link  minicart-link only-icon m-0"
                                    style="cursor: pointer">
                                    <input type="radio" name="theme_choice" id="theme" {{-- value="{{ Cookie::get('theme') != null ? (Cookie::get('theme') == 'dark' ? 'light' : 'dark') : 'light' }}" --}}
                                        value="{{ $dark == 'dark' ? 'light' : 'dark' }}" class="btn-check "
                                        onchange="this.form.submit();">
                                    <i
                                        class="{{ Cookie::get('theme') == 'light' ? 'fas fa-moon fa-lg' : 'fas fa-sun text-warning' }} "></i>
                                    {{-- Mode --}}
                                </label>
                            </form>


                            <div class="search_container_desktop">
                                <div class="dropdn dropdn_search dropdn_fullwidth">
                                    <a href="#" class="dropdn-link js-dropdn-link only-icon"><i
                                            class="icon-search"></i><span class="dropdn-link-txt">بحث عن</span></a>
                                    <div class="dropdn-content">
                                        <div class="container">
                                            <form method="get" action="#" class="search search-off-popular">
                                                <input name="search" type="text" class="search-input input-empty"
                                                    placeholder="ما الذي تريد البحث عنه؟" />
                                                <button type="submit" class="search-button">
                                                    <i class="icon-search"></i>
                                                </button>
                                                <a href="#" class="search-close js-dropdn-close"><i
                                                        class="icon-close-thin"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdn dropdn_account dropdn_fullheight">
                                <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                                    data-panel="#dropdnAccount"><i class="icon-user"></i><span
                                        class="dropdn-link-txt">حسابي</span></a>
                            </div>

                            {{-- call to cart component livewire for cart and wishlist counter --}}
                            <livewire:frontend.cart-component />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</header>


@section('script')
    <script>
        //change currency 
        function currency_change(currency_code) {
            $.ajax({
                type: 'POST',
                url: '{{ route('currency.load') }}',
                data: {
                    currency_code: currency_code,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response['status']) {
                        location.reload();
                    } else {
                        alert('server error');
                    }

                }
            })
        }
    </script>
@endsection
