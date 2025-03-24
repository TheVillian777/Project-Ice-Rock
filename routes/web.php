
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/', [HomeController::class, 'gatherData'])->name('index');

Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/index', [HomeController::class, 'gatherData'])->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/wishlist1', function () {
    return view('wishlist1');
});

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/basket', function () {
    return view('basket');
});

Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/', [HomeController::class, 'gatherData'])->name('admin');

route::get('/saved' , function(){
    return view('saved');
})->name('saved');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/', [HomeController::class, 'gatherData'])->name('index');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');

Route::get('/listing', [ShopController::class, 'listBook'])->name('listing');
Route::get('/wishing', [ShopController::class, 'addToWishlist'])->name('wishing');
Route::get('/unwishing', [ShopController::class, 'removeFromWishlist'])->name('unwishing');
Route::get('/listing/{book_id}/reviews', [ReviewController::class, 'seeReviews'])->name('seeReviews');


// Authentication for users
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/forgottenPassword', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword');

//ContactUs Storing
Route::post('/contact', [ContactUsController::class, 'contactUs'])->name('contactUs');

// Shop related Routes
Route::get('/shop', [ShopController::class, 'gatherData'])->name('shop'); //allows login function in AuthController to redirect to shop once logged in

Route::post('/shopSearch', [ShopController::class, 'searchShop'])->name('shopSearch');
Route::post('/shopFilter', [ShopController::class, 'filterShop'])->name('shopFilter');
Route::post('/listing', [ShopController::class, 'listBook'])->name('listing');



Route::post('/navigateShop', [ShopController::class, 'navShop'])->name('navigateShop');

//Ensures user is logged in and authenticated
Route::middleware(['auth'])->group(function(){
    Route::post ('/addToBasket', [ShopController::class, 'addToBasket'])->name('addToBasket');
    Route::get ('/basket', [BasketController::class, 'viewBasket'])->name('basket');
    Route::post ('/basket/basketUpdate', [BasketController::class, 'basketUpdate'])->name('basketUpdate');
    Route::post ('/basket/basketRemove', [BasketController::class, 'basketRemove'])->name('basketRemove');
});

Route::post('confirmBasket', [CheckoutController::class, 'validateBasket'])->name('confirmBasket');

//When calling profile ensure user is logged in first
Route::get('/profile', [ProfileController::class, 'directToProfile'])->name('profile');
Route::post('/updatePaymentDetails', [ProfileController::class, 'updatePaymentDetails'])->name('updatePaymentDetails');
Route::post('/updateInfo', [ProfileController::class, 'updateInfo'])->name('updateInfo');
Route::post('/returnItem', [ProfileController::class, 'returnItem'])->name('returnItem');
Route::post('/viewOrder', [ProfileController::class, 'viewOrder'])->name('viewOrder');

//Ensures user is logged in and authenticated
Route::middleware(['auth'])->group(function(){
    Route::post('/listing/reviewBook', [ReviewController::class, 'reviewSubmit'])->name('reviewSubmit');
});
