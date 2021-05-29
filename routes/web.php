<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/team', [HomeController::class, 'team'])->name('home.team');
Route::get('/offers', [HomeController::class, 'plans'])->name('home.plans');
Route::get('wapspeed', [HomeController::class, 'wapspeed'])->name('home.wapspeed');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('why-us', [HomeController::class, 'whyUs'])->name('home.why-us');
Route::get('/register', [UserController::class, 'create'])->name('user.register');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/register-success', [UserController::class, 'registerSuccess'])->name('user.register-success');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [UserController::class, 'store'])->name('user.register');
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('user.forgot-password');
Route::post('/send-password-reset-link', [UserController::class, 'sendPasswordResetLink'])->name('user.send-password-reset-link');
Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])->name('user.reset-password');
Route::post('/reset-password', [UserController::class, 'updatePassword'])->name('user.submit-password-reset');
Route::post('/deploy', [HomeController::class, 'deploy'])->name('deploy');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{id}/fund-account', [UserController::class, 'fundAccount'])->name('user.fund-account');
    Route::get('/user/{id}/compose-email', [UserController::class, 'composeMail'])->name('user.compose-email');
    Route::post('/user/send-email', [UserController::class, 'sendMail'])->name('user.send-email');

    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');


    Route::resource('paymentmethod', 'PaymentMethodController');

    Route::get('/deposit/{id}/pay', [DepositController::class, 'paymentPage'])->name('deposit.payment-page');
    Route::put('/deposit/{id}/confirmPayment', [DepositController::class, 'confirmPayment'])->name('deposit.confirm-payment');
    Route::put('/deposit/{id}/haspaid', [DepositController::class, 'hasPaid'])->name('deposit.has-paid');
    Route::put('/deposit/{id}/hasnotpaid', [DepositController::class, 'hasNotPaid'])->name('deposit.has-not-paid');
    Route::resource('deposit', 'DepositController');

    Route::resource('plans', 'PlanController');

    Route::post('/account/debit', [AccountController::class, 'debit'])->name('user.withdraw');
    Route::resource('account', 'AccountController')->except(['create']);
    Route::get('/account/{userid}/create', [AccountController::class, 'create'])->name('account.create');

    Route::resource('withdrawalmethod', 'WithdrawalMethodController');
    Route::resource('withdrawal', 'WithdrawalController');

    Route::get('/referrals', [ReferralController::class, 'index'])->name('user.referrals');
    Route::put('/referral/{id}/withdraw-bonus', [ReferralController::class, 'withdrawBonusToBalance'])->name('user.withdraw-referral-bonus');
});
