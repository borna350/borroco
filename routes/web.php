<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'WebsiteController@index')->name('shop');
Route::get('/artisan-register', 'WebsiteController@artisanRegister')->name('artisan.register');
Route::post('/artisan-request', 'WebsiteController@artisanRequest')->name('artisan.request');

Route::group(['prefix' => 'shop'], function () {
//    Route::get('/man', 'WebsiteController@shopMan')->name('shop.man');
//    Route::get('/woman', 'WebsiteController@shopWoman')->name('shop.woman');
//    Route::get('/woman/accessories', 'WebsiteController@shopProduct')->name('shop.products');

//    Route::get('/woman/product/detail', 'WebsiteController@shopProductDetail')->name('shop.products.detail');
    Route::get('/artisans', 'WebsiteController@shopArtisans')->name('shop.artisans');
    Route::get('/artisans/{slug}', 'WebsiteController@shopArtisansSingle')->name('shop.artisans.single');
    Route::get('/cart', 'WebsiteController@shopCart')->name('shop.cart');
    Route::get('/wish-list', 'WebsiteController@shopWish')->name('shop.wish');
    Route::get('/wishlist/{slug}','WebsiteController@storeWishList')->name('wishlist');
    Route::post('/wishlist-destroy/{id}','WebsiteController@wishListDestroy')->name('destroy');
    Route::get('/about', 'WebsiteController@shopAbout')->name('shop.about');


Route::group(['middleware' => ['auth:web']], function () { 
    Route::get('/checkout', 'WebsiteController@checkout')->name('shop.checkout');
    Route::post('/store-payment', 'PaymentController@paymentStore')->name('store.payment');

});
    // Front Dynamic Route
    Route::get('/{catName}/product/{slug}', 'WebsiteController@productDetails')->name('shop.products.detail');
    Route::get('/{slug}', 'WebsiteController@categoryShop')->name('category.shop');
    Route::get('/{cateName}/{slug}', 'WebsiteController@subcategoryShop');



//    Route::get('/product/{slug}', 'WebsiteController@shopProductDetail');
});


Route::group(['prefix' => 'cart'], function () {
    Route::post('/add/{slug}', 'WebsiteController@addToCart')->name('addToCart');
    Route::post('/update', 'WebsiteController@updateCart')->name('update.cart');
    Route::get('/remove/{id}', 'WebsiteController@removeCart')->name('remove.cart');
    Route::get('/destroy', 'WebsiteController@destroyCart')->name('destroy.cart');

    Route::post('/apply-coupon', 'WebsiteController@applyCoupon')->name('apply.coupon');

});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', 'WebsiteController@loginPage')->name('user.login.page');
    Route::get('/reset-passwod', 'WebsiteController@resetPage')->name('user.reset');
    Route::get('/customer-support', 'WebsiteController@customerSupport')->name('user.support');
    Route::get('/account', 'WebsiteController@user_accounts')->name('user.accounts.dashboard');

    Route::get('/order', 'WebsiteController@user_order')->name('user.accounts.order');
    Route::get('/order-view/{id}', 'WebsiteController@user_order_view')->name('user.accounts.order.view');

    Route::get('/address', 'WebsiteController@user_address')->name('user.accounts.address');
    Route::get('/accounts-detail', 'WebsiteController@user_details')->name('user.accounts.details');

    Route::post('/user-update/{id}', 'WebsiteController@userUpdate')->name('user.update');
    
    Route::get('/billing-address', 'WebsiteController@user_billing')->name('user.accounts.billing');
    Route::get('/shipping-address', 'WebsiteController@user_shipping')->name('user.accounts.shipping');

    // For Billing Address Routes
    Route::post('/store-billing', 'BillingController@store')->name('store.billing');

    // For shipping Address Routes
    Route::post('/store-shipping', 'ShippingController@store')->name('store.shipping');
});

Route::group(['prefix' => 'legal-area'], function () {
    Route::get('/privacy-policy', 'WebsiteController@privacyPolicy')->name('extra.privacy');
    Route::get('/work-with-us', 'WebsiteController@workWithUs')->name('extra.work');
    Route::get('/terms-and-condition', 'WebsiteController@termsAndConditoin')->name('extra.terms');
    Route::get('/faqs', 'WebsiteController@faqs')->name('extra.faqs');

});

// admin route area
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\AdminLogin@showLoginForm');
    Route::post('/login', 'Auth\AdminLogin@login')->name('admin.login');
    Route::post('/cat-wise-subcat/{id}', 'Admin\ProductController@categoryWiseSubcategory');
    Route::get('/product-image/delete/{id}', 'Admin\ProductController@imageDelete');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::post('/logout', 'Auth\AdminLogin@logout')->name('admin.logout');

        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

        // for material
        Route::resource('material', 'Admin\MaterialController');
        // for category
        Route::resource('category', 'Admin\CategoryController');
        // for subcategory
        Route::resource('subcategory', 'Admin\SubcategoryController');

        // For Admin Routes
        Route::post('reset-password/{id}', 'Admin\AdminController@resetPassword');
        Route::get('artisan-request', 'Admin\AdminController@artisanRequest')->name('artisan-request');
        Route::get('artisan-accept/{id}', 'Admin\AdminController@artisanAccept');
        Route::get('artisan-reject/{id}', 'Admin\AdminController@artisanReject');
        Route::get('artisan-pending/{id}', 'Admin\AdminController@artisanPending');
        Route::resource('administrator', 'Admin\AdminController');

        // For product Routes
        Route::resource('product', 'Admin\ProductController');

        // For Team Routes
        Route::resource('team', 'Admin\TeamController');

        // For Home Banner Routes
        Route::resource('home-banner', 'Admin\HomeBannerController');

        // For Home Video Routes
        Route::resource('home-video', 'Admin\HomeVideoController');

        // For About Routes
        Route::resource('about', 'Admin\AboutController');

        // For Follow US Routes
        Route::resource('follow-us', 'Admin\FollowUsController');

        // For FAQS Routes
        Route::resource('faq', 'Admin\FaqsController');

        // For Customer Support Routes
        Route::resource('customer-support', 'Admin\CustomerSupportController');

        // For Footer Info Routes
        Route::resource('footer-info', 'Admin\FooterInfoController');

        // For Admin wishlist Routes
        Route::resource('wishlist', 'Admin\WishlistController');

        // For Admin Coupon Routes
        Route::resource('coupon', 'Admin\CouponController');

         // For Admin Order list Routes
         Route::resource('order', 'Admin\OrderController');

         Route::get('order-done/{id}', 'Admin\OrderController@orderDone');
         Route::get('order-reject/{id}', 'Admin\OrderController@orderReject');
         Route::get('order-pending/{id}', 'Admin\OrderController@orderPending');

        
    });
   

    
    Route::post('/customer-support', 'Admin\CustomerSupportController@store')->name('customer.support');
});

//Route::get('/home', 'HomeController@index')->name('home');
 


