<?php

use App\Models\Plan;
use App\Models\User;
use App\Models\Team;
use GuzzleHttp\Middleware;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Route;
use App\Livewire\MaintenanceMode;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Ticket\TicketsController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\NicheController;
// use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\Admin\StoresController;
// use App\Http\Controllers\Admin\DnsController;
use App\Http\Controllers\Team\TeamMemberController;
use App\Http\Controllers\Ticket\CommentsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Subscriptions\PlanController;
use App\Http\Controllers\Admin\StripeBalanceController;
use App\Http\Controllers\Admin\DownloadBackupController;
use App\Http\Controllers\Admin\PlanController as StripePlan;
use JoelButcher\Socialstream\Http\Controllers\OAuthController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionController;
use App\Http\Controllers\Account\DashboardController as AccountDashboardController;
use JoelButcher\Socialstream\Http\Controllers\Inertia\PasswordController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCardController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController;
use Carbon\Carbon;
use App\Livewire\Account\Dashboard;
use App\Livewire\Account\Tuto\Tuto;
use App\Livewire\Account\Blog\Blog;
use App\Livewire\Account\Shopify\Home;
use App\Livewire\Account\Shopify\SingleProduct;
use App\Livewire\Account\Shopify\MultipleProducts;
use App\Livewire\Account\Shopify\Wizard;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
use Laravel\Socialite\Facades\Socialite;





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
Route::get('resetdb', function () {
    // php artisan migrate:refresh --seed
    \Artisan::call('migrate:refresh --seed');
    dd("Data base has been reset");
});

// Google Authentification
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/callback/google', [GoogleAuthController::class, 'handleGoogleCallback']);


Route::fallback(function() {
        return view('welcome');
 });

Route::group(['middleware' => 'language'], function () {
    Route::get('oauth/{provider}', [OAuthController::class, 'redirectToProvider'])->name('oauth.redirect');
    Route::get('auth/{provider}/callback',[OAuthController::class, 'handleProviderCallback'])->name('oauth.callback');
   
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/fr', function () {
        return view('welcomefr');
    })->name('homefr');
    Route::get('/nl', function () {
        return view('welcomenl');
    })->name('homenl');
    Route::get('/pt', function () {
        return view('welcomept');
    })->name('homept');
    Route::get('/es', function () {
        return view('welcomees');
    })->name('homees');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('/privacypolicy', function () {
        return view('pages.privacypolicy');
    })->name('privacypolicy');

    Route::get('/RefundPolicy', function () {
        return view('pages.RefundPolicy');
    })->name('RefundPolicy');

    Route::get('/TermsandConditions', function () {
        return view('pages.TermsandConditions');
    })->name('TermsandConditions');

    // Route to list all blog posts
    Route::get('/blog-home', [BlogController::class, 'index'])->name('blog.index');

    // Route to show a single blog post
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    
    // redirect link shopify affilate
    Route::get('/shopify', function () {
        return redirect('https://shopify.pxf.io/MmW3NY');
    });

    //sitemap
    Route::get('/sitemap.xml', [SitemapController::class, 'index']);


    Route::get('/thankyou', function () {
        // Directly redirect to the dashboard
        return redirect('/dashboard');
    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('dashboard.index');
    Route::group(['prefix' => '', 'as' => 'account.', 'middleware' => ['auth:sanctum', 'verified']], function () {
       
        Route::view('security', 'account.security')->name('security');
        Route::view('password', 'account.password')->name('password');
        Route::view('social', 'profile.social')->name('social');
        Route::get('plan', function () {
            $team = Auth::user()->personalTeam();
            return view('account.plan', ['team' => $team]);
        })->name('plan');

        // Livewires 3
        Route::get('/Dashboard', Dashboard::class)->name('Dashboard.index');
        //      
        Route::get('/Shopify', Home::class)->name('homeshopify.index');
        Route::get('/Singleproduct', SingleProduct::class)->name('singleproduct.index');
        Route::get('/multipleproduct', MultipleProducts::class)->name('multipleproduct.index');
        Route::get('/Wizard', Wizard::class)->name('wizard.index');

        //
        Route::get('/Tutorial', Tuto::class)->name('tutorial.index');


        // Route::get('proresearch', ProductResearch::class)->name('proresearch');

        // export product in csv
        // Route::get('/product/importproduct/{url}', [AccountProductController::class, 'importproduct'])->name('product.importproduct');



        // track store from product research

      //  Route::post('/stores/trackstore/{id}', [AccountStoresController::class, 'trackstore'])->name('stores.trackstore');


    });

    Route::group(['namespace' => 'Subscriptions', 'middleware' => 'auth'], function () {
        Route::get('/plans', [PlanController::class, 'index'])->name('subscription.plans')->middleware('not.subscribed');
        Route::get('/subscriptions', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'index'])->name('subscriptions');
        Route::post('/subscriptions', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'store'])->name('subscriptions.store');

    });


    Route::get('/test', function () {
        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.welcome', [], function ($message) {
            $message
                ->from('info@fastmesaj.com')
                ->to('dukenst2006@gmail.com', 'John Smith')
                ->subject('Welcome!');
        });
    });

    // Route::get('accept/{token}', [TeamMemberController::class, 'acceptInvite'])->name('teams.accept_invite');

    Route::group(['middleware' => 'verified', 'namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('account');
        Route::get('/preference', [AccountController::class, 'preference'])->name('account.preference');
        Route::get('/activity', [AccountController::class, 'activity'])->name('account.activity');

        Route::group(['namespace' => 'Subscriptions',['middleware' => 'subscribed'], 'prefix' => 'subscriptions'], function () {
            Route::get('/', [SubscriptionController::class, 'index'])->name('account.subscriptions');
            Route::get('/endtrial', [SubscriptionController::class, 'updatetrial'])->name('account.subscriptions.updatetrial');

            Route::get('/cancel', [SubscriptionCancelController::class, 'index'])->name('account.subscriptions.cancel');
            Route::post('/cancel', [SubscriptionCancelController::class, 'store']);

            Route::get('/resume', [SubscriptionResumeController::class, 'index'])->name('account.subscriptions.resume');
            Route::post('/resume', [SubscriptionResumeController::class, 'store']);

            Route::get('/swap', [SubscriptionSwapController::class, 'index'])->name('account.subscriptions.swap');
            Route::post('/swap', [SubscriptionSwapController::class, 'store']);

            Route::get('/card', [SubscriptionCardController::class, 'index'])->name('account.subscriptions.card');
            Route::post('/card', [SubscriptionCardController::class, 'store']);
            Route::post('/newcard', [SubscriptionCardController::class, 'newPaymentMethod'])->name('account.subscriptions.newcard');

            Route::get('/coupon', [SubscriptionCouponController::class, 'index'])->name('account.subscriptions.coupon');
            Route::post('/coupon', [SubscriptionCouponController::class, 'store']);

            Route::get('/invoices', [SubscriptionInvoiceController::class, 'index'])->name('account.subscriptions.invoices');
            Route::get('/invoices/{id}', [SubscriptionInvoiceController::class, 'show'])->name('account.subscriptions.invoice');
            // Route::get('/subscriptions/trial', ['App\Http\Controllers\Subscriptions\SubscriptionController', 'updatetrial'])->name('subscriptions.updatetrial');

        });
    });
    Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'account', 'as' => 'ticket.'], function () {
        /* Ticket Routes */
        Route::get('new-ticket', [TicketsController::class, 'create'])->name('create');

        Route::post('new-ticket', [TicketsController::class, 'store']);

        Route::get('my_tickets', [TicketsController::class, 'userTickets'])->name('index');

        Route::get('tickets/{ticket_id}', [TicketsController::class, 'show'])->name('show');

        Route::post('comment', [CommentsController::class, 'postComment'])->name('comment');
        Route::post('close_ticket', [TicketsController::class, 'close_by_user'])->name('close_by_user');
    });

    Route::impersonate();

    Route::group(['prefix' => 'adminwennify23', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'role:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('/users', UserController::class);
        Route::get('activity', [UserController::class, 'activity'])->name('activity');

        Route::resource('/permissions', PermissionController::class);

        Route::resource('/roles', RoleController::class);

        /* Plans Resource Routes */
        Route::resource('/plans', StripePlan::class);
        Route::resource('/coupons', CouponController::class);

        // Admin Ticket system
        Route::get('tickets', [TicketsController::class, 'index'])->name('tickets');

        Route::post('close_ticket/{ticket_id}', [TicketsController::class, 'close']);
        Route::get('tickets/{ticket_id}', [TicketsController::class, 'adminshow']);

        Route::view('backups', 'admin.backup.index')->name('backup.index');
        Route::get('download-backup', DownloadBackupController::class);
        Route::get('maintenance', MaintenanceMode::class)->name('maintenance');
        Route::get('subscriptions-cancel', ['App\Http\Controllers\Admin\SubscriptionController', 'cancelSubscription'])->name('subscription.cancel');
        Route::get('subscriptions', ['App\Http\Controllers\Admin\SubscriptionController', 'subscription'])->name('subscriptions');

        Route::get('/stripe/charges', [StripeBalanceController::class , 'index']);
        Route::get('/stripe/charges/{id}', [StripeBalanceController::class , 'show']);
        Route::get('/stripe/balance', [StripeBalanceController::class , 'index']);

        Route::view('notifications', 'admin.notifications')->name('notifications');


        Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
        Route::get('/blog/edit/{post}', [BlogPostController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{post}', [BlogPostController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
        Route::post('/blog/upload', [BlogPostController::class, 'upload'])->name('blog.upload');


        // Route::resource('/product', ProductController::class);
        // Route::resource('/stores', StoresController::class);
        // Route::resource('/dns', DnsController::class);
        // Route::resource('/niches', NicheController::class);
        // Route::get('/stores/storeproducts/{id}', [StoresController::class, 'storeproducts'])->name('stores.storeproducts');

    });

});


//export storesXcel
// Route::get('/exportstores', function () {
//     return Excel::download(new StoresExport, 'stores.xlsx');

// });
