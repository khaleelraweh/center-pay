<?php

use App\Http\Controllers\Backend\AdvertisorSliderController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CardController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CommonQuestionController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerAddressController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MainSliderController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\ProductCardController;
use App\Http\Controllers\Backend\ProductCategoriesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\ShippingCompanyController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\SupervisorController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\OrderController;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);

//Frontend 
Route::get('/',         [FrontendController::class,'index'])->name('frontend.index');


Route::get('/index',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/card-category/{slug?}',[FrontendController::class,'card_category'])->name('frontend.card_category');
// Route::get('/shop/tags/{slug}',[Frontend\FrontendController::class,'shop_tag'])->name('frontend.shop_tag');
Route::get('/product/{slug?}',[FrontendController::class,'product'])->name('frontend.product');
// Route::get('/cart',[Frontend\FrontendController::class,'cart'])->name('frontend.cart');
// Route::get('/wishlist',[Frontend\FrontendController::class,'wishlist'])->name('frontend.wishlist');



//Backend


Route::group(['prefix'=>'admin' , 'as' =>'admin.'],function(){
    
    //guest to website 
    Route::group(['middleware'=>'guest'],function(){
        Route::get('/login', [BackendController::class,'login'])->name('login');
        Route::get('/register', [BackendController::class,'register'])->name('register');
        Route::get('/lock-screen', [BackendController::class,'lock_screen'])->name('lock-screen');
        Route::get('/recover-password', [BackendController::class,'recover_password'])->name('recover-password');

    });

    //uthenticate to website 
    Route::group(['middleware'=>['roles','role:admin|supervisor']],function(){
        Route::get('/', [BackendController::class,'index'])->name('index2');
        Route::get('/index', [BackendController::class,'index'])->name('index');
        
        Route::get('account_settings',[BackendController::class,'account_settings'])->name('account_settings');
        Route::post('admin/remove-image',[BackendController::class,'remove_image'])->name('remove_image');
        Route::patch('account_settings',[BackendController::class,'update_account_settings'])->name('update_account_settings');
        
        Route::post('product_categories/remove-image', [ProductCategoriesController::class, 'remove_image'])->name('product_categories.remove_image');
        Route::resource('product_categories', ProductCategoriesController::class);
        
        Route::post('products/remove-image', [ProductController::class, 'remove_image'])->name('products.remove_image');
        Route::resource('products', ProductController::class);
        
        Route::post('main_sliders/remove-image', [MainSliderController::class, 'remove_image'])->name('main_sliders.remove_image');
        Route::resource('main_sliders', MainSliderController::class);
        
        Route::post('advertisor_sliders/remove-image', [AdvertisorSliderController::class, 'remove_image'])->name('advertisor_sliders.remove_image');
        Route::resource('advertisor_sliders', AdvertisorSliderController::class);

        Route::resource('tags', TagController::class);
        
        Route::post('cards/remove-image', [CardController::class, 'remove_image'])->name('cards.remove_image');
        Route::resource('cards', CardController::class);
        
        Route::post('product_cards/remove-image', [ProductCardController::class, 'remove_image'])->name('product_cards.remove_image');
        Route::resource('product_cards', ProductCardController::class);

        Route::resource('coupons',CouponController::class);


        Route::post('customers/remove-image', [CustomerController::class, 'remove_image'])->name('customers.remove_image');
        Route::get('customers/get_customers',[CustomerController::class ,'get_customers'])->name('customers.get_customers');
        Route::resource('customers',CustomerController::class);

        Route::post('supervisors/remove-image', [SupervisorController::class, 'remove_image'])->name('supervisors.remove_image');
        Route::resource('supervisors',SupervisorController::class);
        
        Route::resource('customer_addresses',CustomerAddressController::class);

        Route::resource('countries',CountryController::class);
        
        Route::get('states/get_states',[StateController::class,'get_states'])->name('states.get_states');
        Route::resource('states',StateController::class);
        
        Route::get('cities/get_cities',[CityController::class,'get_cities'])->name('cities.get_cities');
        Route::resource('cities',CityController::class);

        Route::resource('shipping_companies',ShippingCompanyController::class);

        Route::resource('product_reviews',ProductReviewController::class);

        Route::post('payment_methods/remove-image', [PaymentMethodController::class, 'remove_image'])->name('payment_methods.remove_image');
        Route::resource('payment_methods',PaymentMethodController::class);

        Route::resource('orders',OrderController::class);

        Route::resource('common_questions',CommonQuestionController::class);

        Route::post('news/remove-image', [NewsController::class, 'remove_image'])->name('news.remove_image');
        Route::resource('news',NewsController::class);



    });
    
});

