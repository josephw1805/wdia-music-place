<?php

use App\Http\Controllers\Frontend\AlbumContentController;
use App\Http\Controllers\Frontend\AlbumController;
use App\Http\Controllers\Frontend\AlbumPageController;
use App\Http\Controllers\Frontend\ArtistDashboardController;
use App\Http\Controllers\Frontend\ArtistProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CertificateController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\PayoutGatewayController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use App\Http\Controllers\Frontend\SubscribedAlbumController;
use App\Http\Controllers\Frontend\WithdrawController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/**
 * Frontend Routes
 */
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('newsletter-subscribe', [FrontendController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('about', [FrontendController::class, 'about'])->name('about.index');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact.index');

Route::get('/artist/{id}/profile', function (string $artistId) {
    $artist = User::findOrFail($artistId);
    return view('frontend.pages.artist', compact('artist'));
})->name('artist.index');
Route::get('/albums', [AlbumPageController::class, 'index'])->name('albums.index');
Route::get('/albums/{slug}', [AlbumPageController::class, 'show'])->name('albums.show');

/** 
 * Cart Routes
 */
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart/{album}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

/**
 * Payment Routes
 */
Route::get('checkout', CheckoutController::class)->name('checkout.index');
Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
Route::get('paypal/success', [PaymentController::class, 'paypaleSuccess'])->name('paypal.success');
Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

Route::get('order-success', [PaymentController::class, 'orderSuccess'])->name('order.success');
Route::get('order-failed', [PaymentController::class, 'orderFailed'])->name('order.failed');

/**
 * Student Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/become-artist', [StudentDashboardController::class, 'becomeArtist'])->name('become-artist');
    Route::post('/become-artist/{user}', [StudentDashboardController::class, 'becomeArtistUpdate'])->name('become-artist.update');

    /** Profile Routes */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    /** Subscribed album Routes */
    Route::get('subscribed-albums', [SubscribedAlbumController::class, 'index'])->name('subscribed-albums.index');
    Route::get('album-player/{slug}', [SubscribedAlbumController::class, 'playerIndex'])->name('album-player.index');
    Route::get('get-track-content', [SubscribedAlbumController::class, 'getTrackContent'])->name('get-track-content');
    Route::post('update-watch-history', [SubscribedAlbumController::class, 'updateWatchHistory'])->name('update-watch-history');
    Route::post('update-track-completion', [SubscribedAlbumController::class, 'updateTrackHistory'])->name('update-track-completion');

    /** Certificate Routes */
    Route::get('certificate/{album}/download', [CertificateController::class, 'download'])->name('certificate.download');
});

/**
 * Artist Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:artist'], 'prefix' => 'artist', 'as' => 'artist.'], function () {
    Route::get('/dashboard', [ArtistDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('/profile', [ArtistProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{user}', [ArtistProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ArtistProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [ArtistProfileController::class, 'updatePassword'])->name('profile.update-password');

    /** Album Routes */
    Route::get('albums', [AlbumController::class, 'index'])->name('albums.index');
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

    /** PayoutGateway Routes */
    Route::get('gateways', [PayoutGatewayController::class, 'index'])->name('gateways.index');
    Route::post('update-gateway-info', [PayoutGatewayController::class, 'updateGatewayInfo'])->name('update-gateway-info');

    /** Withdraw Routes */
    Route::get('withdrawals', [WithdrawController::class, 'index'])->name('withdrawals.index');
    Route::post('withdrawals/request-payout', [WithdrawController::class, 'requestPayout'])->name('withdrawals.request-payout.create');

    /** lfm Routes */
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
