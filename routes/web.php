<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\ResultController as AdminResultController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\PackageController as StudentPackageController;
use App\Http\Controllers\Student\PracticeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public subscription page
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');

/*
|--------------------------------------------------------------------------
| Student Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');

    // Packages
    Route::get('/packages', [StudentPackageController::class, 'index'])->name('packages.index');
    Route::get('/packages/{package}', [StudentPackageController::class, 'show'])->name('packages.show');

    // Exam
    Route::post('/packages/{package}/start', [ExamController::class, 'start'])->name('exam.start');
    Route::get('/packages/{package}/question/{question}', [ExamController::class, 'showQuestion'])->name('exam.question');
    Route::post('/packages/{package}/question/{question}', [ExamController::class, 'submitAnswer'])->name('exam.submit');
    Route::get('/packages/{package}/confirm-finish', [ExamController::class, 'confirmFinish'])->name('exam.confirm-finish');
    Route::post('/packages/{package}/finish', [ExamController::class, 'finish'])->name('exam.finish');
    Route::get('/exam/{attempt}/result', [ExamController::class, 'result'])->name('exam.result');

    // Practice
    Route::get('/practice/history', [PracticeController::class, 'history'])->name('practice.history');
    Route::post('/packages/{package}/practice/start', [PracticeController::class, 'start'])->name('practice.start');
    Route::get('/practice/{attempt}/question/{question}', [PracticeController::class, 'showQuestion'])->name('practice.question');
    Route::post('/practice/{attempt}/question/{question}', [PracticeController::class, 'submitAnswer'])->name('practice.submit');
    Route::get('/practice/{attempt}/result', [PracticeController::class, 'result'])->name('practice.result');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

/*
|--------------------------------------------------------------------------
| E-commerce Routes (Student)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/package/{package}', [CartController::class, 'addPackage'])->name('cart.add.package');
    Route::post('/cart/subscription/{subscription}', [CartController::class, 'addSubscription'])->name('cart.add.subscription');
    Route::delete('/cart/{cartId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/payment/{order}', [CheckoutController::class, 'uploadProof'])->name('checkout.upload-proof');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{order}', [OrderController::class, 'cancel'])->name('orders.cancel');

    // Subscriptions
    Route::get('/my-subscription', [SubscriptionController::class, 'mySubscription'])->name('subscriptions.my');
});

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login']);
    });

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout')->middleware('admin');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Packages
    Route::get('/packages/import', [AdminPackageController::class, 'import'])->name('packages.import');
    Route::post('/packages/import', [AdminPackageController::class, 'processImport'])->name('packages.process-import');
    Route::get('/packages/template', [AdminPackageController::class, 'downloadTemplate'])->name('packages.template');
    Route::resource('packages', AdminPackageController::class);

    // Questions
    Route::get('/packages/{package}/questions/create', [AdminQuestionController::class, 'create'])->name('questions.create');
    Route::post('/packages/{package}/questions', [AdminQuestionController::class, 'store'])->name('questions.store');
    Route::get('/packages/{package}/questions/{question}/edit', [AdminQuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/packages/{package}/questions/{question}', [AdminQuestionController::class, 'update'])->name('questions.update');
    Route::delete('/packages/{package}/questions/{question}', [AdminQuestionController::class, 'destroy'])->name('questions.destroy');

    // Students
    Route::get('/students', [AdminStudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [AdminStudentController::class, 'show'])->name('students.show');

    // Results
    Route::get('/packages/{package}/results', [AdminResultController::class, 'index'])->name('results.index');
    Route::get('/results/{attempt}', [AdminResultController::class, 'show'])->name('results.show');
    Route::post('/answers/{answer}/grade', [AdminResultController::class, 'gradeEssay'])->name('results.grade');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/pending-payments', [AdminOrderController::class, 'pendingPayments'])->name('orders.pending-payments');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::post('/payments/{payment}/verify', [AdminOrderController::class, 'verifyPayment'])->name('payments.verify');
    Route::post('/payments/{payment}/reject', [AdminOrderController::class, 'rejectPayment'])->name('payments.reject');

    // Subscriptions
    Route::get('/subscriptions/subscribers', [AdminSubscriptionController::class, 'subscribers'])->name('subscriptions.subscribers');
    Route::resource('subscriptions', AdminSubscriptionController::class);
});
