<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\EnvController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\MediaController;
use App\Http\Controllers\Seller\MedialistController;
use App\Http\Controllers\Seller\BarcodeController;
use App\Http\Controllers\Seller\RiderController;
use App\Http\Controllers\Seller\SettingsController;



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

// DISABLED BY MUTAMAN

// Route::get('cache-clear',function(){
//    Artisan::call('cache:clear');
//    Artisan::call('config:clear');
// });

// Route::get('php-info',function(){
//   phpinfo();
// });

// END


// Match my own domain
Route::group(['domain' => env('APP_URL')], function($domain)
{

    Auth::routes(['verify' => true]); // Include the 'verify' option to enable email verification routes

    Route::controller(WelcomeController::class)->group(function () {
        Route::get('/', 'index')->name('welcome');
        Route::get('demos','demos')->name('demos');
        Route::post('/seller/lang/switch','lang_switch')->name('lang.switch');
        Route::post('subscribe','subscribe')->name('subscribe');
    });

    Route::controller(BlogController::class)->group(function() {
        Route::get('blog/{title}','show')->name('blog.show');
        Route::get('blogs/search','search')->name('blog.search');
        Route::get('blogs','lists')->name('blog.lists');
    });

    Route::get('page/{slug}','PageController@show')->name('page.show');

    Route::controller(ContactController::class)->group(function() {
        Route::get('contact','index')->name('contact.index');
        Route::post('contact/send','send')->name('contact.send')->middleware('throttle:2,1');
    });

    Route::get('pricing','PricingController@index')->name('princing.index');

    Route::controller(RegisterController::class)->group(function() {
        Route::get('register','index')->name('user.register')->middleware('guest');
        Route::get('user/login','login')->name('user.login')->middleware('guest');
        Route::post('user/store','store')->name('user.store')->middleware('guest');
    });

    // **---------------------------------------CRON JOB ROUTES START---------------------------------------** //

    Route::controller(CronController::class)->group(function() {
        //automatic charge from the credits
        Route::get('cron/make-charge', 'makeCharge');
        // Alert after Order Expired
        Route::get('cron/alert-user/after/order/expired', 'alertUserAfterExpiredOrder')->name('alert.after.order.expired');
        // Alert before Order Expired
        Route::get('cron/alert-user/before/order/expired', 'alertUserBeforeExpiredOrder')->name('alert.before.order.expired');
        Route::get('cron/tenant-reset-product-price', 'tenantPricereset');
    });


     Route::get('/sitemap.xml', [SettingController::class, 'sitemapView']);
     Route::get('locale/lang', [LocalizationController::class, 'store'])->name('language.set');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(UserController::class)->group(function() {
        Route::get('/mysettings', 'index')->name('admin.admin.mysettings')->middleware('auth');
        Route::post('genup', 'genUpdate')->name('admin.users.genupdate')->middleware('auth');
        Route::post('passup', 'updatePassword')->name('admin.users.passup')->middleware('auth');
    });

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin','user']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::controller(DashboardController::class)->group(function() {
            Route::get('/dashboard/static', 'staticData');
            Route::get('/dashboard/perfomance/{period}', 'perfomance');
            Route::get('/dashboard/deposit/perfomance/{period}', 'depositPerfomance');
            Route::get('/dashboard/order_statics/{month}', 'order_statics');
            Route::get('/dashboard/visitors/{days}', 'google_analytics');
        });

        Route::resource('cron', CronController::class);

        Route::resource('store', StoreController::class);
        Route::post('stores/destroys', [StoreController::class, 'destroy'])->name('stores.destroys');

        Route::resource('domain', DomainController::class);
        Route::post('domains/destroys', [DomainController::class, 'destroy'])->name('domains.destroys');

        Route::controller(StoreController::class)->group(function() {
            Route::get('domain/edit/database/{id}', 'databaseView')->name('domain.database.edit');
            Route::put('domain/update/database/{id}', 'databaseUpdate')->name('database.update');
            Route::get('domain/edit/plan/{id}', 'planView')->name('domain.plan.edit');
            Route::put('domain/update/plan/{id}', 'planUpdate')->name('domain.plan.update');
        });

        Route::resource('seo', SeoController::class);
        Route::resource('env', EnvController::class);
        Route::get('site/settings', [EnvController::class, 'theme_settings'])->name('site.settings');

        Route::resource('plan', PlanController::class);

        Route::controller(PlanController::class)->group(function() {
            Route::post('plans/delete', 'destroy')->name('plans.destroys');
            Route::get('/plan/config/settings','settings')->name('plan.settings');
            Route::put('/plan/config/update/{type}','settingsUpdate')->name('plan.settings.update');
        });

        //language
        Route::resource('language', 'LanguageController');
        Route::controller(LanguageController::class)->group(function() {
            Route::get('languages/delete/{id}', 'destroy')->name('languages.delete');
            Route::post('languages/setActiveLanuguage', 'setActiveLanuguage')->name('languages.active');
            Route::post('languages/add_key', 'add_key')->name('language.add_key');
        });

        // Menu Route
        Route::resource('menu', 'MenuController');
        Route::controller(MenuController::class)->group(function() {
            Route::post('/menus/destroy', 'destroy')->name('menus.destroy');
            Route::post('menues/node', 'MenuNodeStore')->name('menus.MenuNodeStore');
        });

        //role routes
        Route::resource('role', 'RoleController');
        Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
        // Admin Route
        Route::resource('admin', 'AdminController');
        Route::post('/admins/destroy', [AdminController::class, 'destroy'])->name('admins.destroy');

        //Gateway crud controller
        Route::resource('gateway', PaymentGatewayController::class);
        //Blog crud controller
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
        //Page crud controller
        Route::resource('page', PageController::class);

        Route::resource('template', ThemeController::class);

        Route::controller(StoreController::class)->group(function() {
            Route::get('/dns/settings', 'dnsSettingView')->name('dns.settings');
            Route::put('/dns/update', 'dnsUpdate')->name('dns.update');
            Route::get('/developer/instruction', 'instructionView')->name('developer.instruction');
            Route::put('/instruction/update', 'instructionUpdate')->name('developer.instruction.update');
        });

        //Support Route
        Route::resource('support', SupportController::class);

        Route::controller(SupportController::class)->group(function() {
            Route::post('supportInfo', 'getSupportData')->name('support.info');
            Route::post('supportstatus', 'supportStatus')->name('support.status');
        });

        //Option route
        Route::controller(OptionController::class)->group(function() {
            Route::get('option/edit/{key}', 'edit')->name('option.edit');
            Route::post('option/update/{key}', 'update')->name('option.update');
            Route::get('option/sco-index', 'seoIndex')->name('option.seo-index');
            Route::get('option/seo-edit/{id}', 'seoEdit')->name('option.seo-edit');
            Route::put('option/seo-update/{id}', 'seoUpdate')->name('option.seo-update');
        });

        //Theme settings
        Route::get('theme/settings', 'OptionController@settingsEdit')->name('theme.settings');
        Route::put('theme/settings-update/{id}', 'OptionController@settingsUpdate')->name('theme.settings.update');

        Route::controller(ThemesettingsController::class)->group(function() {
            Route::get('theme/settings/General','general')->name('settings.general');
            Route::post('theme/settings/General','generalupdate')->name('settings.general.update');
            Route::get('theme/settings/services','serviceindex')->name('settings.service.index');
            Route::get('theme/settings/services/create','servicecreate')->name('settings.service.create');
            Route::post('theme/settings/services/store','servicestore')->name('settings.service.store');
            Route::get('theme/settings/services/{id}/edit','serviceedit')->name('settings.service.edit');
            Route::put('theme/settings/services/update/{id}','serviceupdate')->name('settings.service.update');
            Route::post('theme/settings/services/destroy','servicedestroy')->name('settings.service.destroy');
            Route::get('theme/footer','footerindex')->name('settings.footer.index');
            Route::post('theme/settings/footer','footerupdate')->name('settings.footer.update');
            Route::get('theme/settings/themes','demo_lists')->name('settings.demo');
            Route::get('theme/settings/theme/create','demo_create')->name('settings.demo.create');
            Route::post('theme/settings/theme/create','demo_store')->name('settings.demo.store');
            Route::get('theme/settings/theme/{id}/edit','demo_edit')->name('settings.demo.edit');
            Route::put('theme/settings/theme/update/{id}','demo_update')->name('settings.demo.update');
            Route::post('theme/settings/theme/destroy','demo_destroy')->name('settings.demo.destroy');
            // Added by mutaman for testimonials
            Route::get('theme/settings/testimonials','testimonials_lists')->name('settings.testimonials');
            Route::get('theme/settings/testimonial/create','testimonial_create')->name('settings.testimonial.create');
            Route::post('theme/settings/testimonial/create','testimonial_store')->name('settings.testimonial.store');
            Route::get('theme/settings/testimonial/{id}/edit','testimonial_edit')->name('settings.testimonial.edit');
            Route::put('theme/settings/testimonial/update/{id}','testimonial_update')->name('settings.testimonial.update');
            Route::post('theme/settings/testimonial/destroy','testimonial_destroy')->name('settings.testimonial.destroy');
            // end added
        });

        //Order Route
        Route::resource('order', OrderController::class);

        //merchant crud and mail controller
        Route::resource('partner', MerchantController::class);

        Route::controller(MerchantController::class)->group(function() {
            Route::post('merchant-send-mail/{id}', 'sendMail');
            Route::get('merchant-login/{id}', 'login')->name('merchant.login');
        });


        //Report Route
        Route::resource('report', ReportController::class);

        Route::controller(ReportController::class)->group(function() {
            Route::get('order-excel', 'excel')->name('order.excel');
            Route::get('order-csv', 'csv')->name('order.csv');
            Route::get('order-pdf', 'pdf')->name('order.pdf');
            Route::get('report-invoice/{id}', 'invoicePdf')->name('report.pdf');
        });

        // Fund History Route
        Route::controller(FundController::class)->group(function() {
            Route::get('fund/history','history')->name('fund.history');
            Route::post('fund/approved','approved')->name('fund.approved');
            Route::post('fund/store','store')->name('fund.store');
        });

    });


    Route::group(['prefix' => 'partner', 'as' => 'merchant.', 'namespace' => 'Merchant', 'middleware' => ['auth', 'merchant','user']], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard-data','DashboardController@staticData');

        Route::controller(App\Http\Controllers\Merchant\DomainController::class)->group(function() {

            Route::get('domain', 'index')->name('domain.list');
            Route::get('domain/create','create')->name('domain.create');
            Route::get('domain/edit/{id}', 'edit')->name('domain.edit');
            Route::put('domain/update/{id}', 'update')->name('domain.update');
            Route::post('domain/check','check')->name('domain.check');
            Route::post('domain/store','store')->name('domain.store');
            Route::get('domain/select/plan','gateway')->name('domain.payment');

            Route::get('domain/configuration/{id}', 'domainConfig')->name('domain.domainConfig');
            Route::post('domain/add-subdomain/{id}','addSubdomain')->name('add.subdomain');
            Route::put('domain/update-subdomain/{id}','updateSubdomain')->name('update.subdomain');
            Route::delete('domain/delete-subdomain/{id}','destroy')->name('destroy.subdomain');

            Route::post('domain/add-customdomain/{id}','addCustomDomain')->name('add.customdomain');
            Route::put('domain/update-customdomain/{id}','updateCustomDomain')->name('update.customdomain');
            Route::delete('domain/delete-customdomain/{id}','destroyCustomdomain')->name('destroy.customdomain');

            Route::get('/domain/transfer/{id}','transferView')->name('domain.transfer');
            Route::post('/domain/otp/{id}','sendOtp')->name('domain.transfer.otp')->middleware('throttle:5,1');
            Route::post('/domain/varifyotp/{id}','verifyOtp')->name('domain.verify.otp')->middleware('throttle:5,1');

            Route::get('/domain/developer-mode/{id}','developerView')->name('domain.developer');
            Route::post('/domain/migrate-seed/{id}','migrateWithSeed')->name('domain.migrate-seed');
            Route::post('/domain/migrate/{id}','migrate')->name('domain.migrate');
            // added by mutaman for fresh migrate
            Route::post('/domain/fresh-migrate/{id}','freshMigrate')->name('domain.fresh-migrate');
            // end added
            Route::post('/domain/clear-cache/{id}','cacheClear')->name('domain.clear-cache');
            Route::post('/domain/remove-storage/{id}','removeStorage')->name('domain.storage.clear');
            // added by mutaman for maintenance mode
            Route::post('/domain/enable-maintenance/{id}','enableMaintenance')->name('domain.enable.maintenance');
            Route::post('/domain/disable-maintenance/{id}','disableMaintenance')->name('domain.disable.maintenance');
            // end
            Route::post('/domain/login/{id}','login')->name('domain.login');
            Route::post('/domain-login/{id}','loginByDomain')->name('domain.login.domain');
        });


        Route::resource('plan', 'PlanController');

        Route::controller(App\Http\Controllers\Merchant\PlanController::class)->group(function() {
            Route::get('/domain/renew/{id}','renewView')->name('domain.renew');
            Route::get('/plan/domain/{id}','changePlan')->name('domain.plan');
            Route::get('/plancharge/{domain}/{id}', 'ChanePlanGateways')->name('plan.gateways');
            Route::post('/domain/renewcharge/{id}','renewCharge')->name('plan.renew-plan');

            Route::get('/gateways/{id}', 'gateways')->name('plan.gateways');
            Route::post('/deposit', 'deposit')->name('plan.deposit');
            Route::get('plan-invoice/{id}', 'invoicePdf');
            Route::get('enroll', 'enroll')->name('plan.enroll');
            Route::post('enroll/store', 'storePlan')->name('enroll.domain');

            // Store Create
            Route::get('store/create','strorecreate')->name('plan.strorecreate');

            //Payment status route
            Route::get('payment/success', 'success')->name('payment.success');
            Route::get('payment/failed', 'failed')->name('payment.failed');
        });

        //Support Route
        Route::resource('support', SupportController::class);

        //Report Route
        Route::resource('report', ReportController::class);

        // Fund Route
        Route::resource('fund', FundController::class);

        Route::controller(FundController::class)->group(function() {
            Route::get('fund/payment/select','payment')->name('fund.payment');
            Route::post('fund/deposit','deposit')->name('fund.deposit');
            Route::get('fund/history/list','history')->name('fund.history');
            Route::get('fund/redirect/success', 'success')->name('fund.success');
            Route::get('fund/redirect/fail', 'fail')->name('fund.fail');
        });

        Route::get('plan-renew/redirect/success', [PlanController::class, 'renewSuccess']);
        Route::get('plan-renew/redirect/fail', [PlanController::class, 'renewFail']);

        // Lock Store
        Route::get('store/lock/{id}', [PlanController::class, 'lock'])->name('store.lock');

        // Order Routes
        Route::get('order', [App\Http\Controllers\Merchant\OrderController::class, 'index'])->name('order.index');
    });

});








Route::group(['as' => 'seller.', 'prefix' => 'seller', 'namespace' => 'Seller', 'middleware' => ['InitializeTenancyByDomain','PreventAccessFromCentralDomains','auth','seller','user','tenantenvironment']], function () {
    // Added by mutaman for store data modal
    Route::post('/dashboard', [App\Http\Controllers\Seller\SitesettingsController::class, 'setStore'])->name('dashboard.modal');

    Route::controller(App\Http\Controllers\Seller\DashboardController::class)->group(function() {
        Route::get('/dashboard', 'dashboard');
        Route::get('/dashboard/static', 'staticData');
        Route::get('/dashboard/perfomance/{period}', 'perfomance');
        Route::get('/dashboard/order-perfomance/{period}', 'orderPerfomace');
        Route::get('/dashboard/deposit/perfomance/{period}', 'depositPerfomance');
        Route::get('/dashboard/order_statics/{month}', 'order_statics');
        Route::get('/dashboard/neworders', 'getCurrentOrders')->name('orders.new');
        Route::get('/clear-cache', 'cacheClear');
        Route::get('/subscription-status', 'subscriptionStatus');
        //Added by mutaman for seller RTL
        Route::post('lang/switch', 'lang_switch');
        //End
    });

    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('tag', TagController::class);
    Route::resource('orderstatus', OrderstatusController::class);
    Route::resource('coupon', CouponController::class);
    // Commented by mutaman because controller not found
    // Route::resource('tax', TaxController::class);
    Route::resource('location', LocationController::class);
    Route::resource('shipping', ShippingController::class);
    Route::resource('features', FeaturesController::class);
    Route::resource('product', ProductController::class);
    Route::post('product-import', [ProductController::class, 'import'])->name('product.import');
    Route::get('product/edit/{id}/{type}', [ProductController::class, 'edit']);
    Route::post('products/destroys', [ProductController::class, 'multiDelete'])->name('products.destroys');
    Route::resource('attribute', AttributeController::class);
    Route::resource('media', MediaController::class);
    Route::resource('mediacompress', ImagecompressController::class);
    Route::resource('table', TableController::class);
    Route::resource('barcode', BarcodeController::class);
    Route::get('barcodes/reset', [BarcodeController::class, 'reset'])->name('barcode.reset');
    Route::resource('user', App\Http\Controllers\Seller\UserController::class);
    Route::get('/user/login/{id}', [App\Http\Controllers\Seller\UserController::class, 'login'])->name('user.login');
    Route::resource('rider', RiderController::class);
    Route::get('settings', [SettingsController::class, 'index']);
    Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('medias', [MedialistController::class, 'index']);
    Route::post('media/delete', [MedialistController::class, 'delete'])->name('medias.delete');
    Route::get('media/create', [MedialistController::class, 'create'])->name('medias.create');

    Route::controller(PaymentgatewayController::class)->group(function() {
        Route::get('payment/gateway','index')->name('payment.gateway');
        Route::post('payment/custom/gateway','custom_payment')->name('custom.payment');
        Route::get('payment/custom/gateway/create','custom_payment_create')->name('custom.payment.create');
        Route::post('payment/gateway/{id}','store')->name('payment.gateway.store');
        Route::get('payment/gateway/{payment}','payment_edit')->name('payment.edit');
        Route::get('payment/install/{payment}','install')->name('payment.install');
        Route::get('payment/uninstall/{payment}','uninstall')->name('payment.uninstall');
    });

    Route::get('theme','ThemeController@index')->name('theme.index');
    Route::get('theme/install/{theme}','ThemeController@install')->name('theme.install');

    Route::resource('language', LanguageController::class);
    Route::controller(LanguageController::class)->group(function() {
        Route::post('language-addkey/{id}','addKey')->name('language.addkey');
        Route::delete('language-remove-key/{id}','keyRemove')->name('language.keyremove');
    });

    Route::get('calender', [App\Http\Controllers\Seller\CalenderController::class, 'index'])->name('calender.index');
    Route::get('upcominOrders', [App\Http\Controllers\Seller\CalenderController::class, 'upcoming_orders'])->name('seller.order.upcoming');

    Route::post('product/barcode/search', [App\Http\Controllers\Seller\BarcodeController::class, 'search'])->name('barcode.search');
    Route::post('barcode/generate', [App\Http\Controllers\Seller\BarcodeController::class, 'generate'])->name('barcode.generate');

    // Reviews Route
    Route::get('review', [App\Http\Controllers\Seller\ReviewController::class, 'index'])->name('review.index');
    Route::post('review/destroy', [App\Http\Controllers\Seller\ReviewController::class, 'destroy'])->name('review.destroy');

    //pos routes
    Route::resource('pos', 'PosController');
    Route::controller(App\Http\Controllers\Seller\PosController::class)->group(function() {
        Route::get('products','productList')->name('product.json');
        Route::post('add-to-cart','addtocart')->name('add.tocart');
        Route::get('remove-cart/{id}','removecart')->name('remove.cart');
        Route::post('cart-qty','CartQty')->name('cart.qty');
        Route::post('product-search','search')->name('pos.search');
        Route::get('product-varidation/{id}','varidation')->name('pos.varidation');
        Route::post('check-customer','checkcustomer');
        Route::post('make-order','makeorder')->name('pos.order');
        Route::post('make-customer','makeCustomer')->name('pos.customer.store');
        Route::get('apply-tax','applyTax');
    });

    Route::resource('order', App\Http\Controllers\Seller\OrderController::class);
    Route::controller(App\Http\Controllers\Seller\OrderController::class)->group(function() {
        Route::post('orders/destroy','destroy')->name('order.multipledelete');
        Route::get('order/print/{id}','print')->name('order.print');
    });

    Route::resource('notification', FirebaseController::class);
    Route::controller(FirebaseController::class)->group(function() {
        Route::post('/save-token', 'saveToken')->name('save-token');
        Route::post('/send-notification',  'sendNotification')->name('send.notification');
        Route::post('notifications/destroy','destroy')->name('notification.destroys');
    });

    Route::resource('site-settings', SitesettingsController::class);
    Route::resource('google-analytics', GoogleanalyticsController::class);

    // Menu Route
    Route::resource('menu', MenuController::class);
    Route::controller(MenuController::class)->group(function() {
        Route::post('/menus/destroy', 'destroy')->name('menus.destroy');
        Route::post('menues/node', 'MenuNodeStore')->name('menus.MenuNodeStore');
    });

    //role routes
    Route::resource('role', App\Http\Controllers\Seller\RoleController::class);
    Route::post('roles/destroy', [App\Http\Controllers\Seller\RoleController::class, 'destroy'])->name('roles.destroy');
    // Admin Route
    Route::resource('admin', App\Http\Controllers\Seller\AdminController::class);
    Route::post('/admins/destroy', [App\Http\Controllers\Seller\AdminController::class, 'destroy'])->name('admins.destroy');

    Route::resource('page', App\Http\Controllers\Seller\PageController::class);
    Route::resource('blog', App\Http\Controllers\Seller\BlogController::class);
    Route::resource('slider', App\Http\Controllers\Seller\SliderController::class);
    Route::resource('banner', App\Http\Controllers\Seller\BannerController::class);
    Route::resource('special-menu', App\Http\Controllers\Seller\SpecialmenuController::class);

    Route::controller(App\Http\Controllers\Seller\SiteController::class)->group(function() {
        Route::get('/store-settings','index');
        Route::post('/theme-data-update/{type}','updatethemesettings')->name('themeoption.update');
    });

    Route::controller(App\Http\Controllers\Seller\SeoController::class)->group(function() {
        Route::get('settings/seo','index')->name('seo.index');
        Route::post('seo/{page}','update')->name('seo.update');
    });

    Route::controller(App\Http\Controllers\Seller\SettingsController::class)->group(function() {
        Route::get('settings/pwa','pwa')->name('pwa.index');
        Route::post('settings/pwa','pwa_update')->name('pwa.update');
        Route::get('settings/custom_css_js','custom_css_js')->name('custom_css_js.index');
        Route::post('settings/custom_css_js','custom_css_js_update')->name('custom_css_js.update');
    });

});



Route::group(['prefix'=>'rider', 'as' => 'rider.', 'namespace' => 'Rider','middleware'=>['InitializeTenancyByDomain','PreventAccessFromCentralDomains','auth','rider','user','tenantenvironment']], function(){
    Route::controller(App\Http\Controllers\Rider\DashboardController::class)->group(function() {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('live/orders', 'live_orders')->name('live.orders');
    });

    Route::controller(App\Http\Controllers\Rider\SettingsController::class)->group(function() {
        Route::get('settings', 'index')->name('settings.index');
        Route::post('settings', 'update')->name('settings.update');
    });
  
    Route::controller(App\Http\Controllers\Rider\OrderController::class)->group(function() {
        Route::get('order', 'index')->name('order.index');
        Route::get('order/{id}', 'show')->name('order.show');
        Route::post('order/delivered', 'delivered')->name('order.delivered');
        Route::get('order/cancel/{id}', 'cancelled')->name('order.cancelled');
    });

});
