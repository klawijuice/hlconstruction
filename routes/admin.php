<?php

use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Jetstream\Http\Controllers\Inertia\ApiTokenController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;

/**
 * Cette route retourne la vue pour l'authentification de l'administrateur
 */
// Route::get('/authenticate', 'Auth\AuthController@index');
/**
 * Cette route permet l'authentification de l'administrateur
 */
// Route::post('/authenticate', 'Auth\AuthController@login');


$enableViews = config('fortify.views', true);

// Authentication...
if ($enableViews) {
    Route::get('/authenticate', [AuthenticatedSessionController::class, 'create'])
        ->middleware(['guest'])
        ->name('admin.login');
}

$limiter = config('fortify.limiters.login');

Route::post('/authenticate', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest',
        $limiter ? 'throttle:' . $limiter : null,
    ]));

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('admin.logout');

// Password Reset...
if (Features::enabled(Features::resetPasswords())) {
    if ($enableViews) {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
            ->middleware(['guest'])
            ->name('admin.password.request');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
            ->middleware(['guest'])
            ->name('admin.password.reset');
    }

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware(['guest'])
        ->name('admin.password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware(['guest'])
        ->name('admin.password.update');
}

//------------------------------------------------------------------------------------------------------------

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Route::middleware(['auth', "role:super admin"])->prefix("admin")->group(function () {
    // Cette route retourne le tableau de bord
    Route::get("/dashboard", "PagesController@index")->name("admin.pages.dashboard");

    // LISTE DES ARTICLES
    Route::get("/posts/online", "PostsController@online")->name('admin.posts.online');
    // Route pour voir les articles hors ligne
    Route::get("/posts/offline", "PostsController@offline")->name('admin.posts.offline');
    // Route pour voir les articles brouillon ligne
    Route::get("/posts/drafts", "PostsController@drafts")->name('admin.posts.drafts');
    // Routes pour la gestion des articles
    Route::resource("/posts", "PostsController", [
        'names' => "admin.posts"
    ]);

    Route::get("/products/online", "ProductsController@online")->name('admin.products.online');
    // Route pour voir les articles hors ligne
    Route::get("/products/offline", "ProductsController@offline")->name('admin.products.offline');
    // Route pour voir les articles brouillon ligne
    Route::get("/products/drafts", "ProductsController@drafts")->name('admin.products.drafts');
    // Routes pour la gestion des articles
    Route::resource("/products", "ProductsController", [
        'names' => "admin.products"
    ]);
    /**
     * Route pour la gestion des catégories
     */
    Route::resource("/categories", "CategoriesController", [
        "names" => "admin.categories"
    ]);
    /**
     * Route pour la gestion des catégories
     */
    Route::resource("/faqs", "FaqController", [
        "names" => "admin.faq"
    ]);
    /**
     * filtrer les groupes en fonction de l'id de la categorie
     */
    Route::get('categories/filtergroups/{category_id}', 'CategoriesController@filterGroups')->name('categories.filter.groups');

    // User & Profile...
    Route::get('/user/profile', [UserProfileController::class, 'show'])
        ->name('admin.profile.show');

    Route::delete('/user/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
        ->name('admin.other-browser-sessions.destroy');

    Route::delete('/user', [CurrentUserController::class, 'destroy'])
        ->name('admin.current-user.destroy');

    Route::delete('/user/profile-photo', [ProfilePhotoController::class, 'destroy'])
        ->name('admin.current-user-photo.destroy');

    // API...
    if (Jetstream::hasApiFeatures()) {
        Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('admin.api-tokens.index');
        Route::post('/user/api-tokens', [ApiTokenController::class, 'store'])->name('admin.api-tokens.store');
        Route::put('/user/api-tokens/{token}', [ApiTokenController::class, 'update'])->name('admin.api-tokens.update');
        Route::delete('/user/api-tokens/{token}', [ApiTokenController::class, 'destroy'])->name('admin.api-tokens.destroy');
    }
    //---------------------------------------------------------------------------------------------------------------------------
    Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
        $enableViews = config('fortify.views', true);
        // Email Verification...
        if (Features::enabled(Features::emailVerification())) {
            if ($enableViews) {
                Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                    ->middleware(['auth'])
                    ->name('admin.verification.notice');
            }

            Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

            Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('admin.verification.send');
        }

        // Profile Information...
        if (Features::enabled(Features::updateProfileInformation())) {
            Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
                ->middleware(['auth'])
                ->name('admin.user-profile-information.update');
        }

        // Passwords...
        if (Features::enabled(Features::updatePasswords())) {
            Route::put('/user/password', [PasswordController::class, 'update'])
                ->middleware(['auth'])
                ->name('admin.user-password.update');
        }

        // Password Confirmation...
        if ($enableViews) {
            Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware(['auth'])
                ->name('admin.password.confirm');

            Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
                ->middleware(['auth'])
                ->name('admin.password.confirmation');
        }

        Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
            ->middleware(['auth']);

        // Two Factor Authentication...
        if (Features::enabled(Features::twoFactorAuthentication())) {
            if ($enableViews) {
                Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                    ->middleware(['guest'])
                    ->name('admin.two-factor.login');
            }

            Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
                ->middleware(['guest']);

            $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
                ? ['auth', 'password.confirm']
                : ['auth'];

            Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
                ->middleware($twoFactorMiddleware)
                ->name('admin.store-two-factor-authentication');

            Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
                ->middleware($twoFactorMiddleware)
                ->name('admin.delete-two-factor-authentication');

            Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
                ->middleware($twoFactorMiddleware)
                ->name('admin.two-factor-qr-code');

            Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
                ->middleware($twoFactorMiddleware)
                ->name('admin.two-factor-recovery-codes');

            Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
                ->middleware($twoFactorMiddleware)
                ->name('admin.store-two-factor-recovery-codes');
        }
    });
});
});
