<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\homeController;               
use App\Http\Controllers\admin\homeadminController;               
use App\Http\Controllers\authController;               
use App\Http\Controllers\commentController;               
use App\Http\Controllers\postController;               
use App\Http\Controllers\categoryController;               
use App\Http\Controllers\userController;      

use App\Http\Middleware\checkRoleAdmin;
use App\Http\Middleware\checkRoleUser;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;


//guest can access
Route::get('/', [homeController::class, 'index']);
Route::post('/search', [homeController::class, 'search']);
Route::get('/detail/{id}', [homeController::class, 'detail']);
Route::get('/about', [homeController::class, 'about']);
Route::get('/category', [homeController::class, 'category']);
Route::get('/forgotpassword', [authController::class, 'forgotPassword']);
Route::post('/forgotpassword', [authController::class, 'forgotPassword_']);
Route::get('/changepassforgot/{token}', [authController::class,'changePassForgot']);
Route::post('/changepassforgot/{token}', [authController::class,'changePassForgot_']);

//only member access
Route::middleware([checkRoleUser::class])->prefix('dashboard')->group(function () {
    Route::get('/', [homeController::class, 'dashboard']);

    Route::get('/lock/{id}', [postController::class, 'lock']);
    Route::get('/unlock/{id}', [postController::class, 'unLock']);

    Route::post('/addpost', [postController::class, 'store']);
    Route::get('/mypost/{id}', [postController::class, 'detail']);
    Route::post('/mypost/{id}', [postController::class, 'update']);


    Route::get('/comment/delete/{id}', [commentController::class, 'authorDelete']);

    Route::get('/productdetail/up/{id}', [postController::class, 'upIndexDetail']);
    Route::get('/productdetail/down/{id}', [postController::class, 'downIndexDetail']);

    Route::get('/productdetail/delete/{id}', [postController::class, 'deleteDetail']);
    Route::post('/productdetail/update/{id}', [postController::class, 'updateDetail']);

    Route::post('/productdetail/add/{id}', [postController::class, 'storeDetail']);
});


//only member access
Route::middleware([checkRoleUser::class])->group(function () {
    Route::get('/changepass', [authController::class,'changePass']);
    Route::post('/changepass', [authController::class,'changePass_']);
    Route::get('/forgotpassword1', [authController::class, 'forgotPassword1_']);

    Route::get('/profile', [homeController::class, 'profile']);
    Route::post('/profile', [authController::class, 'update']);

    Route::get('/detail/like/{id}', [authController::class, 'likePost']);
    Route::get('/detail/dislike/{id}', [authController::class, 'dislikePost']);

    Route::post('/comment/{id}', [commentController::class, 'add']);
    Route::get('/comment/delete/{id}', [commentController::class, 'delete']);
    });




    //cant access after login
    Route::middleware([RedirectIfAuthenticated::class])->group(function () {
        Route::get('/auth', [authController::class, 'auth_']);
        Route::post('/login', [authController::class, 'login']);
        Route::post('/register', [authController::class, 'register']);
        });


//only access after login
Route::get('/logout', [authController::class, 'logout'])->middleware([RedirectIfNotAuthenticated::class]);





//only admin access
Route::prefix('admin')->middleware([checkRoleAdmin::class])->group(function () {
    Route::get('/', [homeadminController::class, 'index']);
    
    Route::get('/report', [homeadminController::class, 'report']);

    Route::get('/post', [homeadminController::class, 'post']);
    Route::get('/post/{id}', [postController::class, 'detailAdmin']);

    Route::get('/post/accepted/{id}', [postController::class, 'accepted']);
    Route::get('/post/unaccepted/{id}', [postController::class, 'unAccepted']);

    Route::get('/category', [homeadminController::class, 'category']);
    Route::post('/category', [categoryController::class, 'store']);
    Route::post('/category/{id}', [categoryController::class, 'update']);
    Route::get('/category/lock/{id}', [categoryController::class, 'lock']);
    Route::get('/category/restore/{id}', [categoryController::class, 'unLock']);


    Route::get('/user', [homeadminController::class, 'user']);
    Route::get('/user/lock/{id}', [userController::class, 'lockUser']);
    Route::get('/user/restore/{id}', [userController::class, 'unLockUser']);

    Route::get('/user/lockpost/{id}', [userController::class, 'lockUserPost']);
    Route::get('/user/restorelockpost/{id}', [userController::class, 'unLockUserPost']);
});