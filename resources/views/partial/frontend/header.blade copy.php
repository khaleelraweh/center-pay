<header class="hdr-wrap {{ request()->routeIs('frontend.index') ? 'hdr-transparent' : null }}">

    {{-- تنسيق المتصفحات  --}}
    <div class="hdr-content hdr-content-sticky">
        <div class="container">
            <div class="row">

                {{-- toggler showed in mobile  --}}
                <div class="col-auto show-mobile">
                    <div class="menu-toggle">
                        <a href="#" class="mobilemenu-toggle">
                            <i class="icon-menu"></i>
                        </a>
                    </div>
                </div>

                {{-- logog  --}}
                <div class="col-auto hdr-logo">
                    <a href="index.html" class="logo">
                        <img srcset="
                                    {{ asset('frontend/images/games/logo-games.webp') }}   1x,
                                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x"
                            alt="Logo" />
                    </a>
                </div>

                <div class="hdr-nav hide-mobile nav-holder-s"></div>

                {{-- left navagation  --}}
                <div class="hdr-links-wrap col-auto ml-auto">
                    @livewire('frontend.cart-component')
                </div>
            </div>
        </div>
    </div>

    {{-- تنسيق اجهزة الموبايل  --}}
    <div class="hdr hdr-style5">
        <div class="hdr-content">
            <div class="container">
                <div class="row">

                    {{-- toggler  show in mobile --}}
                    <div class="col-auto show-mobile">
                        <div class="menu-toggle">
                            <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                        </div>
                    </div>

                    {{-- logo --}}
                    <div class="col-auto hdr-logo">
                        <a href="{{ route('frontend.index') }}" class="logo">
                            <img srcset="
                                        {{ asset('frontend/images/games/logo-games.webp ') }}  1x,
                                        {{ asset('frontend/images/games/logo-games2x.webp') }} 2x"
                                alt="سنتر باي" />
                        </a>
                    </div>

                    {{-- right navagation main nav  --}}
                    <div class="hdr-nav hide-mobile nav-holder">
                        <ul class="mmenu mmenu-js">
                            <li class="mmenu-item--simple">
                                <a href="{{ route('frontend.index') }}" class="active"><span>الرئيسية</span></a>
                            </li>
                            <li class="mmenu-item--simple">
                                <a href="#">الاقسام</a>
                                <div class="mmenu-submenu">
                                    <ul class="submenu-list">
                                        <li>
                                            <a href="product.html">قسم البطائق الالكترونية</a>
                                            <ul>
                                                <li>
                                                    <a href="product.html">Product page variant 1<span
                                                            class="menu-label menu-label--color3">Popular</span></a>
                                                </li>
                                                <li>
                                                    <a href="product-2.html">Product page variant 2</a>
                                                </li>
                                                <li>
                                                    <a href="product-3.html">Product page variant 3</a>
                                                </li>
                                                <li>
                                                    <a href="product-4.html">Product page variant 4</a>
                                                </li>
                                                <li>
                                                    <a href="product-5.html">Product page variant 5</a>
                                                </li>
                                                <li>
                                                    <a href="product-6.html">Product page variant 6</a>
                                                </li>
                                                <li>
                                                    <a href="product-7.html">Product page variant 7</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="category.html">قسم الخدمات الالكترونية</a>
                                            <ul>
                                                <li>
                                                    <a href="category.html">Left sidebar filters</a>
                                                </li>
                                                <li>
                                                    <a href="category-closed-filter.html">Closed filters</a>
                                                </li>
                                                <li>
                                                    <a href="category-horizontal-filter.html">Horizontal filters</a>
                                                </li>
                                                <li>
                                                    <a href="category-listview.html">Listing View</a>
                                                </li>
                                                <li>
                                                    <a href="category-empty.html">Empty category</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="cart.html">السلة والدفع</a>
                                            <ul>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="cart-empty.html">Empty cart</a></li>
                                                <li>
                                                    <a href="checkout.html">Checkout variant 1</a>
                                                </li>
                                                <li>
                                                    <a href="checkout-2.html">Checkout variant 2</a>
                                                </li>
                                                <li>
                                                    <a href="checkout-3.html">Checkout variant 3</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="account-create.html">حسابي</a>
                                            <ul>
                                                <li><a href="account-create.html">تسجل الدخول</a></li>
                                                <li>
                                                    <a href="account-create.html">انشاء حساب</a>
                                                </li>
                                                <li>
                                                    <a href="account-details.html">تفاصيل الحساب</a>
                                                </li>
                                                <li>
                                                    <a href="account-addresses.html">Account addresses</a>
                                                </li>
                                                <li>
                                                    <a href="account-history.html">Order History</a>
                                                </li>
                                                <li>
                                                    <a href="account-wishlist.html">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog.html">المدونة</a>
                                            <ul>
                                                <li><a href="blog.html">Right sidebar</a></li>
                                                <li>
                                                    <a href="blog-left-sidebar.html">Left sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-without-sidebar.html">No sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-sticky-sidebar.html">Sticky sidebar</a>
                                                </li>
                                                <li><a href="blog-grid.html">Grid</a></li>
                                                <li><a href="blog-post.html">Blog post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">مركز الصور</a></li>
                                        {{-- <li><a href="faq.html">الأسئلة الشائعة</a></li> --}}
                                        <li><a href="{{ route('frontend.index') }}#questions">الأسئلة الشائعة</a></li>
                                        <li><a href="about.html">حولنا</a></li>
                                        <li><a href="contact.html">اتصل بنا</a></li>
                                        <li><a href="404.html">404 صفحة</a></li>
                                        <li><a href="typography.html">كتابي</a></li>
                                        <li>
                                            <a href="coming-soon.html" target="_blank">انتظرونا قريبا</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mmenu-item--mega">
                                <a href="collections.html"><span>الكروت<span class="menu-label">الشحن</span></span></a>
                                <div class="mmenu-submenu mmenu-submenu--has-bottom">
                                    <div class="mmenu-submenu-inside">
                                        <div class="container">
                                            <div class="mmenu-left width-25">
                                                <div class="mmenu-bnr-wrap">
                                                    <a href="product.html"
                                                        class="image-hover-scale image-container w-100"
                                                        style="padding-bottom: 102.91%">
                                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                            data-srcset="{{ asset('frontend/images/games/megamenu-game-banner.webp') }}"
                                                            class="lazyload fade-up" alt="Banner" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="mmenu-cols column-4">
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title">
                                                        <a href="category.html">المجموعات</a>
                                                    </h3>
                                                    <ul class="submenu-list">
                                                        <li>
                                                            <a href="category.html">Martins d'Art 2020/21<span
                                                                    class="submenu-link-txt">Available in boutiques
                                                                    from June
                                                                    2019</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Spring-Summer 2021<span
                                                                    class="submenu-link-txt">Available in boutiques
                                                                    from March
                                                                    2019</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Spring-Summer 2021
                                                                Pre-Collection<span class="submenu-link-txt">In
                                                                    boutiques</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Cruise 2020/21<span
                                                                    class="submenu-link-txt">In boutiques</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Fall-Winter 2020/21</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title">
                                                        <a href="category.html">استعد للحرب</a>
                                                    </h3>
                                                    <ul class="submenu-list">
                                                        <li>
                                                            <a href="category.html" class="active">Jackets</a>
                                                            <ul class="sub-level">
                                                                <li>
                                                                    <a href="category.html">Bomber Jackets</a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Biker Jacket</a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Trucker Jacket</a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Denim Jackets</a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Blouson Jacket<span
                                                                            class="menu-label">SALE</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Overcoat</a>
                                                                </li>
                                                                <li>
                                                                    <a href="category.html">Trench Coat</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Dresses<span
                                                                    class="menu-label menu-label--color3">SALE</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Blouses & Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Cardigans & Pullovers</a>
                                                        </li>
                                                        <li><a href="category.html">Skirts</a></li>
                                                        <li>
                                                            <a href="category.html">Pants & Shorts</a>
                                                        </li>
                                                        <li><a href="category.html">Outerwear</a></li>
                                                        <li><a href="category.html">Swimwear</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title">
                                                        <a href="category.html">ادوات مساعدة</a>
                                                    </h3>
                                                    <ul class="submenu-list">
                                                        <li><a href="category.html">Jackets</a></li>
                                                        <li><a href="category.html">Dresses</a></li>
                                                        <li>
                                                            <a href="category.html">Blouses & Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Cardigans & Pullovers</a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Skirts<span
                                                                    class="menu-label">SALE</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Pants & Shorts</a>
                                                        </li>
                                                        <li><a href="category.html">Outerwear</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title">
                                                        <a href="category.html">علامات تجارية</a>
                                                    </h3>
                                                    <ul class="submenu-list">
                                                        <li><a href="category.html">Jackets</a></li>
                                                        <li><a href="category.html">Dresses</a></li>
                                                        <li>
                                                            <a href="category.html">Blouses & Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Cardigans & Pullovers</a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Skirts<span
                                                                    class="menu-label menu-label--color1">SALE</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="category.html">Pants & Shorts</a>
                                                        </li>
                                                        <li><a href="category.html">Outerwear</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-bottom justify-content-center">
                                                    <a href="#"><i class="icon-fox icon--lg"></i><b>مركز اخبار
                                                            سنتر باي</b><i class="icon-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- left navagation   --}}
                    <div class="hdr-links-wrap col-auto ml-auto">
                        @livewire('frontend.cart-component')
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>
