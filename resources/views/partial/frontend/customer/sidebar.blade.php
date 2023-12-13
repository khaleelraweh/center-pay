<div class="card border-0 rounded-0 p-lg-4 bg-dark">
    <div class="card-body">
        <h5 class="text-uppercase mb-4">تصفح</h5>

        <div
            class="py-2 px-4 mb-3 {{ Route::currentRouteName() == 'customer.dashboard' ? 'bg-secondary text-white' : 'bg-dark' }} ">
            <a href="{{ route('customer.dashboard') }}">
                <strong class="small text-uppercase font-weight-bold">لوحة التحكم الرئيسية</strong>
            </a>
        </div>
        <div
            class="py-2 px-4 mb-3 {{ Route::currentRouteName() == 'customer.profile' ? 'bg-secondary text-white' : 'bg-dark' }}">
            <a href="{{ route('customer.profile') }}">
                <strong class="small text-uppercase font-weight-bold">الملف الشخصي</strong>
            </a>
        </div>
        <div
            class="py-2 px-4 mb-3 {{ Route::currentRouteName() == 'customer.addresses' ? 'bg-secondary text-white' : 'bg-dark' }}">
            <a href="{{ route('customer.addresses') }}">
                <strong class="small text-uppercase font-weight-bold">العناوين</strong>
            </a>
        </div>
        <div
            class="py-2 px-4 mb-3 {{ Route::currentRouteName() == 'customer.orders' ? 'bg-secondary text-white' : 'bg-dark' }}">
            <a href="{{ route('customer.orders') }}">
                <strong class="small text-uppercase font-weight-bold">طلباتي</strong>
            </a>
        </div>
        <div class="py-2 px-4 mb-3 ') bg-dark">
            <a href="javascript:void(0);"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <strong class="small text-uppercase font-weight-bold">تسجيل الخروج</strong>
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                @csrf
            </form>
        </div>

    </div>
</div>
