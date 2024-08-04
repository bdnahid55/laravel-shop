<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;


// ---------------------------- sample template view --------------------------------------

Route::view('/example-page', 'example-page');
Route::view('/example-datatable', 'example-datatable-page');
Route::view('/example-auth', 'example-auth');

// ----------------------------------------------------------------------------------------

// Route for Login
Route::controller(AuthController::class)->group(function () {
    Route::get('adminuser/login', 'index')->name('admin.login');
    Route::post('adminuser/login-process', 'LoginProcess')->name('adminuser.login-process');
});

// ----------------------------------------------------------------------------------------

	// Route for Homepage
	Route::get('/', function () {
		return view('welcome');
	});

// ----------------------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    // Route for admin homepage / Dashboard
    Route::controller(AuthController::class)->group(function () {
        Route::get('/home', 'dashboard')->name('home');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/change-password', 'changePassword')->name('change-password');
        Route::post('/password-update/{id}', 'updatePassword')->name('password-update');
    });

    // Route for permission
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissions.index');
        Route::get('/permissions/{id}/edit', 'edit')->name('permissions.edit');
        Route::post('/permissions/{id}', 'update')->name('permissions.update');
    });

    // Route for role
    Route::controller(RoleController::class)->group(function () {
        Route::get('roles', 'index')->name('roles.index');
        Route::post('roles/', 'store')->name('roles.store');
        Route::get('roles/create', 'create')->name('roles.create');
        Route::get('roles/{id}/show', 'show')->name('roles.show');
        Route::get('roles/{id}/edit', 'edit')->name('roles.edit');
        Route::post('roles/{id}', 'update')->name('roles.update');
        Route::post('roles/delete/{id}', 'destroy')->name('roles.destroy');

    });

    // Route for Backup
    Route::controller(BackupController::class)->group(function () {
        Route::get('backup/create-new-backup', 'create')->name('backup.create-new-backup');
        Route::get('backup/all-backup', 'index')->name('backup.all-backup');
        Route::get('backup/delete-backup', 'destroy')->name('backup.delete-backup');
    });

    // Route for admin create
    Route::controller(AdminController::class)->group(function () {
        Route::get('admins/all-admins', 'index')->name('admins.all'); // show all
        Route::get('admins/create-admins', 'create')->name('admins.create-admins'); // show create admin
        Route::post('admins/insert-admins', 'store')->name('admins.insert-admins'); // create process
        Route::get('admins/preview-admins/{id}', 'show')->name('admins.show-admins'); // show admin preview
        Route::get('admins/edit-admins/{id}', 'edit')->name('admins.edit-admins'); // show edit admin
        Route::post('admins/update-admins/{id}', 'update')->name('admins.update-admins'); // update process
        Route::get('admins/delete-admins/{id}', 'destroy')->name('admins.delete-admins'); // delete process
    });

    // Route for category create
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/categories', 'index')->name('category.all-category');
        Route::get('/category/fetch-categorys', 'fetchcategorys');
        Route::post('/category/categories', 'store');
        Route::get('/category/edit-category/{id}', 'edit');
        Route::put('/category/update-category/{id}', 'update');
        Route::delete('/category/delete-category/{id}', 'destroy');
    });



    // End
});
