<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;

//admin connection
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\TourBlockedDateController;

//verify email
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TourBookingController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\AdminSetupController;
use App\Http\Controllers\Admin\AdminTourController;

use App\Http\Controllers\Admin\AdminCarController;

use App\Http\Controllers\TaxiBookingController;


use App\Http\Controllers\CarController;

use App\Http\Controllers\CarBookingController;

use App\Http\Controllers\CustomTourRequestController;

//for login
use App\Http\Controllers\GoogleController;

use Illuminate\Session\Middleware\StartSession;
//change language
use App\Http\Middleware\SetLocale;

// Route::get('/', function () {
//     return view('home');
// })->name('home');


//Translation language
// Wrap all routes with session + locale middleware

Route::middleware(['web', 'setlocale'])->group(function () {

    //Go to home page
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Go to tour page
    Route::get('/tours', [TourController::class, 'index'])->name('tours.index');

    //go to correspond tour page
    Route::get('/tours/{slug}', [TourController::class, 'show'])->name('tours.show');

    //Go to service page
    Route::get('/service', fn() => view('servicepage'))->name('service');

    //Go Taxi page
    Route::get('/taxi', function () {
        return view('taxipage');
    })->name('taxi'); 

    //Go Contact page
    Route::get('/contact', function (Illuminate\Http\Request $request) {
        return view('contactpage', ['type' => $request->query('type')]);
    })->name('contact');

    //Go to Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'showWishlistPage'])->name('wishlist');

    //Go to Customize Tour page
    Route::get('/customizeTour', [HomeController::class, 'customTour'])->name('customizeTour');

    //Go to Car Rental
    Route::get('/rent-cars', [CarController::class, 'index'])->name('cars.home');

    //Go to car Fleet
    Route::get('/fleet', [CarController::class, 'showFleetPage'])->name('fleet');

    //Go to Car Faq page
    Route::get('/faq', function () {
        return view('carsite.faqpage');
    })->name('faq'); 

    //Go to reservation car page
    Route::get('/reservation', [CarController::class, 'reservationPage'])->name('reservation');

    
    //Go to privacy policy
    Route::get('/privacypolicy', function () {
        return view('privacypolicy');
    })->name('privacypolicy'); 

    //Go to refund policy
    Route::get('/refundpolicy', function () {
        return view('refundpolicy');
    })->name('refundpolicy');

    //Go to cancellation policy
    Route::get('/cancellationpolicy', function () {
        return view('carsite.cancellationpolicy');
    })->name('cancellationpolicy');

    //Go to rental policy
    Route::get('/rentalpolicy', function () {
        return view('carsite.rentalpolicy');
    })->name('rentalpolicy');


    Route::view('/thank-you', 'thankyou')->name('thankyou');

    Route::get('locale/{lang}', function ($lang) {
        if (in_array($lang, ['en','fr','es'])) {
            session(['locale' => $lang]);
            \Log::debug('Locale changed to: ' . $lang);
        }
        return redirect()->back() ?? redirect()->route('home');
    })->name('setLocale');

});

// Auth routes with verification enabled
Auth::routes(['verify' => true]);

// Default email verification page
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Custom verify route (user clicks link in email)
Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // marks email_verified_at
    return redirect('/')->with('status', '✅ Email verified! You can log in now.');
})->middleware(['signed'])->name('verification.verify');



//admin login to form 
// Show login form
Route::get('/admin/secure-Df678pK3/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');

// Handle login POST
Route::post('/admin/secure-Df678pK3/login', [AuthController::class, 'login'])
->middleware('throttle:5,1') // 5 attempts per minute
->name('admin.login');

//Get/Edit email,whatapp,social link
Route::middleware(['auth', 'is_admin'])->group(function () {

    //Dashboard (only logged-in users can access)
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboardpanel');
    })->name('admin.dashboard');

    Route::view('/admin/booktour', 'admin.tourpanel')->name('admin.tourpanel');
    Route::view('/admin/contactpanel', 'admin.contactpanel')->name('admin.contactpanel');
    Route::view('/admin/notificationpanel', 'admin.notificationpanel')->name('admin.notificationpanel');
    Route::view('/admin/carrentalpanel', 'admin.rentalpanel')->name('admin.carrentalpanel');
    Route::view('/admin/discountpanel', 'admin.discountpanel')->name('admin.discountpanel');
    Route::view('/admin/profilepanel', 'admin.profilepanel')->name('admin.profilepanel');
    Route::view('/admin/taxipanel', 'admin.taxipanel')->name('admin.taxipanel');
    Route::view('/admin/custompanel', 'admin.custompanel')->name('admin.custompanel');
    Route::view('/admin/deletepanel', 'admin.deletepanel')->name('admin.deletepanel');

    //Search booktour to display in panel
    Route::get('/admin/tours/bookings/{tourId}/{date}', [TourBookingController::class, 'getBookingsForDate']);

    // Tours( Protected JSON tours)
    Route::get('/admin/tours/json', [AdminTourController::class, 'json'])->name('admin.tours.json');
    Route::put('/admin/tours/{tour}', [AdminTourController::class, 'update'])->name('admin.tours.update');
    //Tour Blocking
    Route::get('/tours/blocked-dates/{id}', [TourBlockedDateController::class, 'getBlockedDates']);
    Route::post('/tours/block-dates', [TourBlockedDateController::class, 'saveBlockedDates']);

    // Cars( Protected JSON cars)
    Route::get('/admin/cars/json', [AdminCarController::class, 'json'])->name('admin.cars.json');
    Route::put('/admin/cars/{car}', [AdminCarController::class, 'update'])->name('admin.cars.update');

    // Deletion
     //Deletion of all data for admin
    Route::post('/delete-data', [AdminSetupController::class, 'deleteData']);
     //Search bulk  deletion (API for preview counts)
    Route::post('/admin/delete-preview', [AdminSetupController::class, 'previewDelete']);

    //Setting
    Route::get('/admin/settings/json', [AdminSetupController::class, 'getSettings'])->name('admin.settings.json');
    Route::post('/admin/settings', [AdminSetupController::class, 'updatesetting'])->name('admin.settings.update');

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Change password
    Route::get('/admin/change-password', [AdminSetupController::class, 'showChangePasswordForm'])->name('admin.password.change');
    Route::post('/admin/change-password', [AdminSetupController::class, 'updatePassword'])->name('admin.password.update');

    //Handle admin logout POST
    Route::post('/admin/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/secure-Df678pK3/login');
    })->name('logout');
});


//For google login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/rentcar/{id}', [CarController::class, 'show'])->name('rentcar.show');



Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        return "✅ Connected to database: <strong>$dbName</strong>";
    } catch (\Exception $e) {
        return "❌ Could not connect to the database. <br>Error: " . $e->getMessage();
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Send contact to email
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


//Save the tour in database
Route::post('/tour-bookings', [TourBookingController::class, 'store']);

//Save custom tour
Route::post('/custom-tour', [CustomTourRequestController::class, 'store'])->name('custom-tour.store');


//Send booking of car
Route::post('/send-quote', [CarBookingController::class, 'store']);

//Sent booking of taxi
Route::post('/taxi-booking-submit', [TaxiBookingController::class, 'store'])->name('taxi.booking.submit');



require __DIR__.'/auth.php';
