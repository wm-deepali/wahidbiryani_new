<?php

use App\Http\Controllers\Admin\{
    FaqController,
    SeoController,
    BlogController,
    LogoutController,
    RedirectController,
    SystemLogController,
    DashboardController,
    NotificationController,
    AdminSettingController,
    EmailTemplateController,
    ContactEnquiryController,
    ProfileSettingController,

};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SitemapController;

Route::middleware('maintenance.mode')->group(function () {

    Route::controller(FrontController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        
    });

});


Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/get-cities', [AdminSettingController::class, 'getCities'])->name('get-cities');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'admin.timeout'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profile-setting', ProfileSettingController::class);
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');

        Route::resource('faqs', FaqController::class)->names('faqs');

        Route::resource('blogs', BlogController::class)->names('blogs');
        
        Route::resource('enquiries', ContactEnquiryController::class)->only(['index', 'show', 'update', 'destroy'])->parameters(['enquiries' => 'enquiry']);
   
        Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
        Route::put('/seo/{id}', [SeoController::class, 'update'])->name('seo.update');

        Route::prefix('redirect-settings')->name('redirect-settings.')->group(function () {
            Route::get('/', [RedirectController::class, 'index'])->name('index');
            Route::post('/', [RedirectController::class, 'store'])->name('store');
            Route::put('/{redirect}', [RedirectController::class, 'update'])->name('update');
            Route::delete('/{redirect}', [RedirectController::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [RedirectController::class, 'bulkDestroy'])->name('bulk-delete');
            Route::post('/bulk-toggle', [RedirectController::class, 'bulkToggle'])->name('bulk-toggle');
            Route::post('/{redirect}/toggle', [RedirectController::class, 'toggleStatus'])->name('toggle');
            Route::get('/export', [RedirectController::class, 'exportCsv'])->name('export');
            Route::get('/template', [RedirectController::class, 'downloadTemplate'])->name('template');
            Route::post('/import', [RedirectController::class, 'importCsv'])->name('import');
        });

        Route::get('/admin-setting', [AdminSettingController::class, 'index'])->name('admin-setting.index');
        Route::post('/smtp-settings/store', [AdminSettingController::class, 'smtpSettingStore'])->name('smtp-settings.store');
        Route::post('/settings/general', [AdminSettingController::class, 'generalSettingStore'])->name('settings.general.store');
        Route::post('admin-setting/google-setting', [AdminSettingController::class, 'googleSettingStore'])->name('admin-setting.google-setting');

        Route::post('settings/email-templates/test', [EmailTemplateController::class, 'sendTest'])->name('settings.email-templates.test');
        Route::post('settings/email-templates/{eventKey}', [EmailTemplateController::class, 'save'])->name('settings.email-templates.save');

        Route::get('/security/system-logs', [SystemLogController::class, 'index'])->name('security.system-logs');

        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('/', [NotificationController::class, 'index'])->name('index');
            Route::post('/read-all', [NotificationController::class, 'markAllRead'])->name('read-all');
            Route::delete('/clear-read', [NotificationController::class, 'clearRead'])->name('clear-read');
            Route::post('/{notification}/read', [NotificationController::class, 'markRead'])->name('read');
            Route::delete('/{notification}', [NotificationController::class, 'destroy'])->name('destroy');
        });

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});



// ══════════════════════════════════════════════════
// FALLBACK ROUTE — must be the very last route registered.
// Only runs when NOTHING above matched (i.e. a genuine 404).
// Checks the redirects table before giving up with a real 404/410.
// ══════════════════════════════════════════════════
Route::fallback(function () {
    $path = '/' . ltrim(request()->path(), '/');

    $redirect = \App\Models\Redirect::active()->where('from_url', $path)->first();

    if ($redirect) {
        $redirect->increment('hits');

        if ($redirect->type === '410') {
            abort(410);
        }

        return redirect($redirect->to_url, (int) $redirect->type);
    }

    abort(404);
});