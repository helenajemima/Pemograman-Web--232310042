<?php 
 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CourseController; 
use App\Http\Controllers\ProfileController; 
 
// ======================= 
// Public Routes (User) 
// ======================= 
 
// Landing/Homepage 
Route::get('/', [CourseController::class, 'showForUser'])->name('user.landing'); 
Route::get('/home', [CourseController::class, 'showForUser'])->name('user.home'); 
 
// Katalog Kursus 
Route::get('/product', [CourseController::class, 'list'])->name('courses.list'); 
 
// Profil Tampilan (non-login) 
Route::get('/profile', fn () => view('users.profile'))->name('user.profile'); 
 
// ======================= 
// Auth-Protected Routes 
// ======================= 
 
Route::middleware(['auth'])->group(function () { 
     
    // Admin Panel (CRUD Course) 
    Route::prefix('admin')->name('admin.')->group(function () { 
        Route::resource('courses', CourseController::class); 
    }); 
 
}); 
 
// ======================= 
// Auth Routes (Login, Register, Logout) 
// ======================= 
require __DIR__.'/auth.php';