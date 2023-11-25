<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'loginauth'], function () {
    Route::controller(ProductController::class)->group(function () {

        Route::get('/productindex',  "product_index")->name('product.index');
        Route::get('/product', "product_form")->name('product.add');
        Route::get('/product/edit/{id}', "product_form_edit")->name('product.edit');
        Route::get('/product/view/{id}', "product_view")->name('product.view');
        Route::put('/product/edit/submit/{id}', "product_form_edit_submit")->name('product.edit.submit');
        Route::post('/product/store', "product_store")->name('product.store');
        Route::delete('/product/{id}', "delete")->name('product.delete');
    });
});

Route::get('/', function () {
    return view('auth.login');
})->name('login.form');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/registration/form', [UserController::class, 'registration_form'])->name('registration.form');
Route::post('/registration/form/submit', [UserController::class, 'registration_form_submit'])->name('registration.form.submit');

Route::post('/login', [UserController::class, "loginsubmit"])->name('login');