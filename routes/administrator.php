<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\DashboardController;
use Illuminate\Support\Facades\Auth;

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


Route::prefix('en/Administrator')->middleware(['auth:web','isAdmin','preventbackhistory','isVerifyEmail'])->group(function(){
    Route::get('Dashboard', [App\Http\Controllers\Administrator\DashboardController::class, 'index'])->name('Administrator.index');
    //user 
    Route::get('Users/List',[App\Http\Controllers\Administrator\UsersController::class, 'index'])->name('SupUser.ListUsers');
    Route::post('User/add',[App\Http\Controllers\Administrator\UsersController::class, 'addNewUser'])->name('SupUser.AddNewUser');
    
    //update user
    Route::post('User/Update/{user_id}',[UsersController::class, 'updateUser'])->name('Administrator.UpdateUser');
    //not working
    Route::post('User/Update/Status',[App\Http\Controllers\Administrator\UsersController::class, 'is_active'])->name('SupUser.UserIsActive');
    Route::post('User/Delete',[App\Http\Controllers\Administrator\UsersController::class, 'softDeleteUser'])->name('SupUser.UserSoftDel');

    //end user

    //settings 
    Route::get('Settings/AboutUsInformation',[App\Http\Controllers\Administrator\Settings\AboutUsInformationController::class, 'index'])->name('SupUser.SetingsAboutUsInfo');

    //end settings

    Route::get('blank',[DashboardController::class, 'blank'])->name('dashboard.blank');
});