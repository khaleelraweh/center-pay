<div class="hdr-group-link hide-mobile">

    <div class="hdr-inline-link">

        {{-- رابط اللغة  --}}
        <div class="dropdn_language">
            <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                <a href="#" class="dropdn-link js-dropdn-link"><span
                        class="js-dropdn-select-current mainBtnLang">اللغة</span><i class="icon-angle-down"></i></a>
                <div class="dropdn-content">
                    <ul>
                        <li>
                            <a href="#eng" data-reload class="mylang" onclick="setLanguageStyle('english');"
                                title="english">
                                <img src="{{ asset('frontend/images/flags/en.webp') }}" alt="" />
                                الانجليزية
                            </a>
                        </li>
                        <li>
                            <a href="#ar" data-reload class="mylang" onclick="setLanguageStyle('arabic');"
                                title="arabic">
                                <img src="{{ asset('frontend/images/flags/ar.webp') }}" alt="" />
                                العربية
                            </a>
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

        {{-- رابط العملة --}}
        <div class="dropdn_currency">
            <div class="dropdn dropdn_caret">
                <a href="#" class="dropdn-link js-dropdn-link">دولار امريكي<i class="icon-angle-down"></i></a>
                <div class="dropdn-content">
                    <ul>
                        <li class="active">
                            <a href="#"><span>دولار امريكي</span></a>
                        </li>
                        <li>
                            <a href="#"><span>يورو</span></a>
                        </li>
                        <li>
                            <a href="#"><span>باوند بريطاني</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="hdr-inline-link">

    {{-- search icon   --}}
    <div class="search_container_desktop">
        <div class="dropdn dropdn_search dropdn_fullwidth">
            <a href="#" class="dropdn-link js-dropdn-link only-icon"><i class="icon-search"></i><span
                    class="dropdn-link-txt">بحث عن</span></a>
            <div class="dropdn-content">
                <div class="container">
                    <form method="get" action="#" class="search search-off-popular">
                        <input name="search" type="text" class="search-input input-empty"
                            placeholder="ما الذي تريد البحث عنه؟" />
                        <button type="submit" class="search-button">
                            <i class="icon-search"></i>
                        </button>
                        <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  login user icon   --}}
    <div class="dropdn dropdn_account dropdn_fullheight">
        <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i
                class="icon-user"></i><span class="dropdn-link-txt">حسابي</span></a>
    </div>


    {{-- wishlist icon  --}}
    <div class="dropdn dropdn_fullheight minicart">
        <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMiniwishlist">
            <i class="icon-heart-stroke"></i>
            <span class="minicart-qty">({{ $wishListCount }})</span>
            <span class="minicart-total hide-mobile">$34.99</span>
        </a>
    </div>

    {{-- shop icon    --}}
    <div class="dropdn dropdn_fullheight minicart">
        <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
            <i class="icon-basket"></i>
            <span class="minicart-qty">({{ $cartCount }})</span>
            <span class="minicart-total hide-mobile">$34.99</span>
        </a>
    </div>

</div>
