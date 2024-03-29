<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\systemAdminController;
use App\Http\Controllers\updateAccountController;
use App\Http\Controllers\UploadFileController;

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

Route::get('/', [HomeController::class, 'index'])->name('/');

// Route::get('/', [LoginController::class, 'showLoginForm']);

// Add Account Routes...
Route::get('/add-account', [systemAdminController::class, 'redirectAddAccount'])->name('admin.add-account')->middleware('admin');
Route::post('/add-account', [RegisterController::class, 'register'])->middleware('admin');

// Update Account Routes...
Route::get('/update_account', [updateAccountController::class, 'redirectUpdateAccount'])->name('update-account');
Route::post('/update_account', [updateAccountController::class, 'update']);

// Dashboard Route...
Route::get('/admin_dashboard', [systemAdminController::class, 'AdminIndex'])->name('admin.dashboard')->middleware('admin');
Route::get('/student_dashboard', [HomeController::class, 'StudentIndex'])->name('student.dashboard')->middleware('student');
Route::get('/public_dashboard', [HomeController::class, 'PublicIndex'])->name('public.dashboard')->middleware('public');

// Login Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Logout Routes...
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Delete User Route...
Route::get('/admin_delete/{userId}', [systemAdminController::class, 'deleteUser'])->name('admin.delete-user')->middleware('admin');

// Update Specific Account Route...
Route::get('/update_account/{userId}', [systemAdminController::class, 'RedirectUpdateSpecificAccount'])->name('admin.update-specific-account')->middleware('admin');
Route::post('/update_account/{userId}', [systemAdminController::class, 'UpdateSpecificAccount'])->middleware('admin');

// Upload File Route...
Route::get('/upload_file', [HomeController::class, 'redirectUploadFile'])->name('student.upload-file')->middleware('student');
Route::post('/upload_file', [UploadFileController::class, 'uploadFile'])->middleware('student');

// Generate Report Route...
Route::get('/generate_report', [reportController::class, 'generateReport'])->name('generate-report')->middleware('student');

// Fetch Data from API Route...
Route::get('/fetch_data', [UploadFileController::class, 'fetchVessels'])->middleware('student');

// Density Of Traffic Route...
Route::get('/density_of_traffic', [HomeController::class, 'redirectDensityOfTraffic'])->name('public.density-of-traffic')->middleware('public');

// Vessel Details Route...
Route::get('/vessel_details', [HomeController::class, 'redirectVesselDetails'])->name('public.vessel-details')->middleware('public');



// // Password Reset Routes...
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// // Password Confirmation Routes...
// Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
// Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// // Email Verification Routes...
// Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');



