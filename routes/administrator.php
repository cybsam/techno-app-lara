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

// Route::get('visit-site',[App\Http\Controllers\Administrator\DashboardController::class, 'VisitWebSite'])->name('supUser.visitWebSite');

Route::prefix('en/Administrator')->middleware(['auth:web','isAdmin','preventbackhistory','isVerifyEmail'])->group(function(){
    Route::get('Dashboard', [App\Http\Controllers\Administrator\DashboardController::class, 'index'])->name('Administrator.index');
    Route::get('Dashboard/profile',[App\Http\Controllers\Administrator\DashboardController::class,'UserProfile'])->name('SupUser.Profile');
    //user 
    Route::get('Users/List',[App\Http\Controllers\Administrator\UsersController::class, 'index'])->name('SupUser.ListUsers');
    Route::post('User/add',[App\Http\Controllers\Administrator\UsersController::class, 'addNewUser'])->name('SupUser.AddNewUser');
    
    //update user
    Route::post('User/Update/{user_id}',[UsersController::class, 'updateUser'])->name('Administrator.UpdateUser');
    //not working
    Route::post('User/Update/Status',[App\Http\Controllers\Administrator\UsersController::class, 'is_active'])->name('SupUser.UserIsActive');
    Route::post('User/Delete',[App\Http\Controllers\Administrator\UsersController::class, 'softDeleteUser'])->name('SupUser.UserSoftDel');

    //end user
    
    // about us
    Route::get('About-Us/Index',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'aboutUs'])->name('SupUser.AboutUsIndex');
    Route::get('About-Us/Mission&Vission',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'missionAndVission'])->name('SupUser.MissionVission');
    Route::get('Our-team/Index',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'index'])->name('SupUser.OurTeam');
    Route::post('Our-team/Index/Insert',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'teamInsert'])->name('SupUser.OurTeamInsert');
    
    // our project
    Route::get('Project/Index',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'showProjectList'])->name('SupUser.ProjectList');
    Route::post('Project/Insert',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectInsert'])->name('SupUser.ProjectInsert');
    Route::get('Project/On-going',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectOnGoing'])->name('SupUser.ProjectOnGoing');
    Route::get('Project/Complete',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectComplete'])->name('SupUser.ProjectComplete');
    
    //category
    Route::get('Project/Category/Index',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'showCategory'])->name('SupUser.ProjectCategoryShow');
    Route::post('Project/Category/Insert',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'ProjectCategoryInsert'])->name('SupUser.ProjectCategoryInsert');
    
    

    // end Project
    
    //settings 
    Route::get('Settings/AboutUsInformation',[App\Http\Controllers\Administrator\Settings\AboutUsInformationController::class, 'index'])->name('SupUser.SetingsAboutUsInfo');
    Route::post('Settings/AboutUsInformation/Update',[App\Http\Controllers\Administrator\Settings\AboutUsInformationController::class, 'updateInformation'])->name('SupUser.SetingsAboutUsInfoUpdate');

    // slider
    Route::get('Settings/Front-slider',[App\Http\Controllers\Administrator\DashboardController::class, 'frontSliderImage'])->name('SupUser.FrontSliderImage');
    Route::post('Settings/Front-slider/update',[App\Http\Controllers\Administrator\DashboardController::class, 'frontSliderImageUpdate'])->name('SupUser.FrontSliderImageUpdate');

    Route::get('Settings/Management/team',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'TeamManagement'])->name('SupUser.TeamManagementInsert');
    Route::post('Settings/Management/team/ins',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'TeamManagementIns'])->name('SupUser.TeamManagementInsertTr');
    Route::get('Settings/Management/degination',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'TeamManagementDegination'])->name('SupUser.TeamManagementDegination');
    Route::post('Settings/Management/degination/Insert',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'TeamManagementDeginationInsert'])->name('SupUser.TeamManagementDeginationInsert');

    Route::get('visit-site',[App\Http\Controllers\Administrator\DashboardController::class, 'VisitWebSite'])->name('supUser.visitWebSite');
    

    //end settings

    //contact
    Route::get('contact/front',[App\Http\Controllers\Administrator\DashboardController::class, 'ContactFrontEnd'])->name('supUser.FrontEndContact');
    Route::get('contact/front/{id}/show',[App\Http\Controllers\Administrator\DashboardController::class, 'ContactFrontEndShow'])->name('supUser.FrontEndContactShow');

    Route::get('blank',[DashboardController::class, 'blank'])->name('dashboard.blank');
});