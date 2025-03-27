<?php

use App\Http\Controllers\Admin\AboutUsSectionController;
use App\Http\Controllers\Admin\AlbumCategoryController;
use App\Http\Controllers\Admin\AlbumContentController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\AlbumGenreController;
use App\Http\Controllers\Admin\AlbumLanguageController;
use App\Http\Controllers\Admin\AlbumSubCategoryController;
use App\Http\Controllers\Admin\ArtistRequestController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\BecomeArtistController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CertificateBuilderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeaturedArtistController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LatestAlbumController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PayoutGatewayController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WithdrawRequestController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

Route::group(['middleware' => 'guest:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**Artist Request Routes */
    Route::get('artist-doc-download/{artist_request}', [ArtistRequestController::class, 'download'])->name('artist-doc-download');
    Route::resource('artist-request', ArtistRequestController::class);

    /** Album Languages Routes */
    Route::resource('album-languages', AlbumLanguageController::class);

    /** Album genres Routes */
    Route::resource('album-genres', AlbumGenreController::class);

    /** Album Categories Routes */
    Route::resource('album-categories', AlbumCategoryController::class);
    Route::get('{album_category}/sub-categories', [AlbumSubCategoryController::class, 'index'])->name('album-sub-categories.index');
    Route::get('{album_category}/sub-categories/create', [AlbumSubCategoryController::class, 'create'])->name('album-sub-categories.create');
    Route::post('{album_category}/sub-categories', [AlbumSubCategoryController::class, 'store'])->name('album-sub-categories.store');
    Route::get('{album_category}/sub-categories/{album_sub_category}/edit', [AlbumSubCategoryController::class, 'edit'])->name('album-sub-categories.edit');
    Route::put('{album_category}/sub-categories/{album_sub_category}', [AlbumSubCategoryController::class, 'update'])->name('album-sub-categories.update');
    Route::delete('{album_category}/sub-categories/{album_sub_category}', [AlbumSubCategoryController::class, 'destroy'])->name('album-sub-categories.destroy');

    /** Album Module Routes */
    Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::put('albums/{album}/update-approval', [AlbumController::class, 'updateApproval'])->name('albums.update-approval');
    Route::get('albums/create', [AlbumController::class, 'create'])->name('albums.create');
    Route::post('albums/create', [AlbumController::class, 'storeBasicInfo'])->name('albums.store-basic-info');
    Route::get('albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
    Route::post('albums/update', [AlbumController::class, 'update'])->name('albums.update');

    Route::get('album-content/{album}/create-chapter', [AlbumContentController::class, 'createChapterModal'])->name('album-content.create-chapter');
    Route::post('album-content/{album}/create-chapter', [AlbumContentController::class, 'storeChapter'])->name('album-content.store-chapter');
    Route::get('album-content/{chapter}/edit-chapter', [AlbumContentController::class, 'editChapterModal'])->name('album-content.edit-chapter');
    Route::post('album-content/{chapter}/update-chapter', [AlbumContentController::class, 'updateChapter'])->name('album-content.update-chapter');
    Route::delete('album-content/{chapter}/destroy-chapter', [AlbumContentController::class, 'destroyChapter'])->name('album-content.destroy-chapter');
    Route::get('album-content/create-track', [AlbumContentController::class, 'createTrack'])->name('album-content.create-track');
    Route::post('album-content/create-track', [AlbumContentController::class, 'storeTrack'])->name('album-content.store-track');
    Route::get('album-content/edit-track', [AlbumContentController::class, 'editTrack'])->name('album-content.edit-track');
    Route::post('album-content/{id}/update-track', [AlbumContentController::class, 'updateTrack'])->name('album-content.update-track');
    Route::delete('album-content/{id}/track', [AlbumContentController::class, 'destroyTrack'])->name('album-content.destroy-track');
    Route::post('album-content/{chapter}/sort-track', [AlbumContentController::class, 'sortTrack'])->name('album-chapter.sort-track');
    Route::get('album-content/{album}/sort-chapter', [AlbumContentController::class, 'sortChapter'])->name('album-content.sort-chapter');
    Route::post('album-content/{album}/sort-chapter', [AlbumContentController::class, 'updateSortChapter'])->name('album-content.update-sort-chapter');

    /** Order Routes */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    /** Payment setting routes */
    Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
    Route::post('paypal-setting', [PaymentSettingController::class, 'paypalSetting'])->name('paypal-setting.update');
    Route::post('stripe-setting', [PaymentSettingController::class, 'stripeSetting'])->name('stripe-setting.update');

    /** Site setting routes */
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('general-settings', [SettingController::class, 'updateGeneralSettings'])->name('general-settings.update');
    Route::get('commission-settings', [SettingController::class, 'commissionSettingIndex'])->name('commission-settings.index');
    Route::post('commission-settings', [SettingController::class, 'updateCommissionSettingIndex'])->name('commission-settings.update');

    /** Payout Gateway Routes */
    Route::resource('payout-gateway', PayoutGatewayController::class);

    /** WIthdraw routes */
    Route::get('withdraw-request', [WithdrawRequestController::class, 'index'])->name('withdraw-request.index');
    Route::get('withdraw-request/{withdraw}/details', [WithdrawRequestController::class, 'show'])->name('withdraw-request.show');
    Route::post('withdraw-request/{withdraw}/status', [WithdrawRequestController::class, 'updateStatus'])->name('withdraw-request.status.update');

    /** Certificate Builder Routes */
    Route::get('certificate-builder', [CertificateBuilderController::class, 'index'])->name('certificate-builder.index');
    Route::post('certificate-builder', [CertificateBuilderController::class, 'update'])->name('certificate-builder.update');
    Route::post('certificate-item', [CertificateBuilderController::class, 'itemUpdate'])->name('certificate-builder.item.update');

    /** Hero Routes */
    Route::get('hero', [HeroController::class, 'index'])->name('hero');
    Route::post('hero', [HeroController::class, 'store'])->name('hero.store');

    /** Feature Routes */
    Route::get('feature', [FeatureController::class, 'index'])->name('feature');
    Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');

    /** About Section Routes */
    Route::get('about-section', [AboutUsSectionController::class, 'index'])->name('about-section');
    Route::post('about-section', [AboutUsSectionController::class, 'store'])->name('about-section.store');

    /** Latest Album Routes */
    Route::get('latest-album', [LatestAlbumController::class, 'index'])->name('latest-album');
    Route::post('latest-album', [LatestAlbumController::class, 'store'])->name('latest-album.store');

    /** Become Artist Routes */
    Route::get('become-artist', [BecomeArtistController::class, 'index'])->name('become-artist');
    Route::post('become-artist', [BecomeArtistController::class, 'store'])->name('become-artist.store');

    /** Video Routes */
    Route::get('video-section', [VideoController::class, 'index'])->name('video-section');
    Route::post('video-section', [VideoController::class, 'store'])->name('video-section.store');

    /** Brand Routes */
    Route::resource('brand', BrandController::class);

    /** Featured Artist Routes */
    Route::get('featured-artist', [FeaturedArtistController::class, 'index'])->name('featured-artist');
    Route::post('featured-artist', [FeaturedArtistController::class, 'store'])->name('featured-artist.store');
    Route::get('get-artist-albums/{id}', [FeaturedArtistController::class, 'getArtistAlbums'])->name('get-artist-albums');

    /** Testimonial Routes */
    Route::resource('testimonial', TestimonialController::class);

    /** Counter Routes */
    Route::get('counter', [CounterController::class, 'index'])->name('counter');
    Route::post('counter', [CounterController::class, 'store'])->name('counter.store');

    /** Contact Routes */
    Route::resource('contact', ContactController::class);
    Route::get('contact-setting', [ContactSettingController::class, 'index'])->name('contact-setting');
    Route::post('contact-setting', [ContactSettingController::class, 'store'])->name('contact-setting.store');
});

/** lfm Routes */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    Lfm::routes();
});
