<?php

use App\Http\Controllers\PatientScanAnalysisController;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
#->middleware('verified') ===>Addthis to routes that you want accessible only by verfied users

Route::get('/scan_analysis', [App\Http\Controllers\HomeController::class, 'index'])->name('scan_analysis')->middleware('verified');

Route::get('add-patient', [PatientScanAnalysisController::class, 'create']);
Route::post('add-patient', [PatientScanAnalysisController::class, 'store'])->name('patient.add');


//EMAIL VERIFICATION BLOCK
// #The Email Verification Notice
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// #The Email Verification Handler
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify')->middleware('verified');

// #Resending The Verification Email
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');