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
    Route::post('Dashboard/profile/update/',[App\Http\Controllers\Administrator\DashboardController::class,'UserProfileUpdateNameImage'])->name('SupUser.ProfileUpdateNameImage');
    Route::post('Dashboard/profile/update/password',[App\Http\Controllers\Administrator\DashboardController::class,'UserProfileUpdatePassword'])->name('SupUser.ProfileUpdatePassword');
    
    //user 
    Route::get('Users/List',[App\Http\Controllers\Administrator\UsersController::class, 'index'])->name('SupUser.ListUsers');
    Route::post('User/add',[App\Http\Controllers\Administrator\UsersController::class, 'addNewUser'])->name('SupUser.AddNewUser');
    
    // update user
    Route::post('User/Update/{user_id}',[App\Http\Controllers\Administrator\UsersController::class, 'updateUser'])->name('Administrator.UpdateUser');
    // not working
    Route::post('User/Update/Status',[App\Http\Controllers\Administrator\UsersController::class, 'is_active'])->name('SupUser.UserIsActive');
    Route::post('User/Delete',[App\Http\Controllers\Administrator\UsersController::class, 'softDeleteUser'])->name('SupUser.UserSoftDel');

    //end user
    
    // about us
    
    Route::get('About-Us/Index',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'aboutUs'])->name('SupUser.AboutUsIndex');
    Route::get('About-Us/Index/update/show',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'aboutUsShowData'])->name('SupUser.AboutUsIndexShow');
    Route::post('About-Us/Index/update',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'aboutUsUpdate'])->name('SupUser.AboutUsIndexUpdate');
    
    
    Route::get('About-Us/Mission&Vission',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'missionAndVission'])->name('SupUser.MissionVission');
    Route::post('About-Us/Mission&Vission/update',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'missionAndVissionUpdate'])->name('SupUser.MissionVissionUpdate');
    Route::get('About-Us/Mission&Vission/{mission_vission_id}/update',[App\Http\Controllers\Administrator\AboutUs\AboutUsController::class, 'missionAndVissionShow'])->name('SupUser.MissionVissionShow');

    Route::get('About-Us/Our-team/Index',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'index'])->name('SupUser.OurTeam');
    Route::post('Our-team/Index/Insert',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'teamInsert'])->name('SupUser.OurTeamInsert');
    Route::post('Our-team/Index/Update/',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'teamUpdate'])->name('SupUser.OurTeamUpdate');
    Route::post('Our-team/Index/Delete',[App\Http\Controllers\Administrator\AboutUs\OurTeamController::class, 'teamDelete'])->name('SupUser.OurTeamDelete');

    Route::get('About-Us/our-concern',[App\Http\Controllers\Administrator\AboutUs\OurConcernController::class, 'bckIndex'])->name('SupUser.OurConcernBck');
    Route::post('About-Us/our-concern/insert',[App\Http\Controllers\Administrator\AboutUs\OurConcernController::class, 'bckIndexInsert'])->name('SupUser.OurConcernBckInsert');
    Route::post('About-Us/our-concern/update',[App\Http\Controllers\Administrator\AboutUs\OurConcernController::class, 'bckIndexUpdate'])->name('SupUser.OurConcernBckUpdate');
    Route::get('About-Us/our-concern/{concern_id}/update/show',[App\Http\Controllers\Administrator\AboutUs\OurConcernController::class, 'bckIndexUpdateShow'])->name('SupUser.OurConcernBckUpdateShow');

    Route::get('About-us/our-expertise',[App\Http\Controllers\Administrator\AboutUs\ExpertiseController::class, 'expertiseIndex'])->name('SupUser.OurExpertiseIndex');
    Route::post('About-us/our-expertise/store',[App\Http\Controllers\Administrator\AboutUs\ExpertiseController::class, 'expertiseStore'])->name('SupUser.OurExpertiseStore');
    Route::post('About-us/our-expertise/update',[App\Http\Controllers\Administrator\AboutUs\ExpertiseController::class, 'expertiseUpdate'])->name('SupUser.OurExpertiseUpdate');
    Route::post('About-us/our-expertise/delete',[App\Http\Controllers\Administrator\AboutUs\ExpertiseController::class, 'expertiseDelete'])->name('SupUser.OurExpertiseDelete');

    Route::get('About-us/Strategic-Partners/Index',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'IndexPartners'])->name('SupUser.OurStrategicPartners');
    Route::get('About-us/Strategic-Partners/Insert',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'InsertPartners'])->name('SupUser.OurStrategicPartnersInsert');
    Route::post('About-us/Strategic-Partners/Insert/save',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'IndexPartnersSave'])->name('SupUser.OurStrategicPartnersInsertSave');
    Route::get('About-us/Strategic-Partners/{strategic_id}/Update',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'IndexPartnersUpdateSh'])->name('SupUser.OurStrategicPartnersUpdateShow');
    Route::post('About-us/Strategic-Partners/Update/s',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'IndexPartnersUpdateSave'])->name('SupUser.OurStrategicPartnersUpdateSave');
    Route::post('About-us/Strategic-Partners/Delete',[App\Http\Controllers\Administrator\AboutUs\StrategicPartnersController::class, 'IndexPartnersDelete'])->name('SupUser.OurStrategicPartnersDelete');
    
    // end about us

    // our project
    Route::get('Project/Index',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'showProjectList'])->name('SupUser.ProjectList');
    Route::post('Project/Insert',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectInsert'])->name('SupUser.ProjectInsert');
    Route::get('Project/{project_id}/{project_slug}/Update',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectUpdate'])->name('SupUser.ProjectUpdate');
    Route::post('Project/Update/save',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectUpdateCom'])->name('SupUser.ProjectUpdateCont');
    Route::post('Project/Delete',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectDelete'])->name('SupUser.ProjectDelete');
    Route::post('Project/archive/',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectArchive'])->name('SupUserProjectArchivePost');
    Route::get('Project/On-going',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectOnGoing'])->name('SupUser.ProjectOnGoing');
    Route::get('Project/Complete',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectComplete'])->name('SupUser.ProjectComplete');
    Route::get('Project/project/archive',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectArchiveList'])->name('SupUser.projectArchiveList');
    Route::post('Project/project/archive/delete',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectArchiveDelete'])->name('SupUser.projectDelteFromDb');
    Route::post('Project/project/archive/restore',[App\Http\Controllers\Administrator\Project\ProjectController::class, 'ProjectArchiveRestore'])->name('SupUser.projectRestoreFromDB');
    //  category
    Route::get('Project/Category/Index',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'showCategory'])->name('SupUser.ProjectCategoryShow');
    Route::post('Project/Category/Insert',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'ProjectCategoryInsert'])->name('SupUser.ProjectCategoryInsert');
    Route::post('Project/Category/Update',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'ProjectCategoryUpdate'])->name('SupUser.ProjectCategoryUpdate');
    Route::post('Project/Category/Delete',[App\Http\Controllers\Administrator\Project\ProjectCategoryController::class, 'ProjectCategorydelete'])->name('SupUser.ProjectCategoryDelete');
    // end Project

    // product and service start
    Route::get('Product-and-service/index',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'index'])->name('SupUser.ProductSerIndex');
    Route::get('Product-and-service/insert',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'insertCheck'])->name('SupUser.ProductSerInsertChk');
    Route::post('Product-and-service/insert/save',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'insert'])->name('SupUser.ProductSerInsert');
    Route::get('Product-and-service/archive/list',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'archiveList'])->name('SupUser.ProductSerArchiveList');
    Route::post('Product-and-service/archive',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'archive'])->name('SupUser.ProductSerArchive');
    Route::get('Product-and-service/trash',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'trush'])->name('SupUser.ProductSertrush');
    Route::get('product-and-service/{product_id}/{product_slug}/update',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'UpdateShowPro'])->name('SupUser.ProductServiceUpdateGetlink');
    Route::post('product-and-service/update',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'Update'])->name('SupUser.ProductServiceUpdate');
    Route::post('product-and-service/delete',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'delete'])->name('SupUser.ProductServiceDelete');
    Route::post('product-and-service/Restore',[App\Http\Controllers\Administrator\ProductService\ProductServiceController::class, 'Restore'])->name('SupUser.ProductServiceRestore');

    Route::get('product-and-service/sub/{menu_slug}',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'index'])->name('SupUserProduct.SubMenuShow');
    Route::get('product-and-service/sub/Insert/{menu_slug}',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'InsertSh'])->name('SupUserProduct.SubMenuInsert');
    Route::post('product-and-service/sub/Insert/s',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'InsertSave'])->name('SupUserProduct.SubMenuInsertS');
    Route::get('product-and-service/sub/{subProUpdate_slug}/show',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'UpdateShow'])->name('SupUserProduct.SubMenuUpdateShow');
    Route::post('product-and-service/sub/update',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'Update'])->name('SupUserProduct.SubMenuUpdate');
    Route::post('product-and-service/sub/delete',[App\Http\Controllers\Administrator\ProductService\ProSerSubController::class, 'Delete'])->name('SupUserProduct.SubMenuDelete');
    // product and service end
    
    //settings 
    Route::get('Settings/AboutUsInformation',[App\Http\Controllers\Administrator\Settings\AboutUsInformationController::class, 'index'])->name('SupUser.SetingsAboutUsInfo');
    Route::get('Settings/AboutUsInformation/{aboutusinfo_id}/update',[App\Http\Controllers\Administrator\Settings\AboutUsInformationController::class, 'indexUpdate'])->name('SupUser.SetingsAboutUsInfoUpd');
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

    // blog section

    Route::get('Blog/Index',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'index'])->name('SupUserBlog.Index');
    Route::get('Blog/Insert',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'insertIndex'])->name('SupUserBlog.InsertIndex');
    Route::post('Blog/Insert/s',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'insert'])->name('SupUserBlog.Insert');
    Route::get('Blog/update/{blog_id}/{blog_slug}',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'Update'])->name('SupUserBlog.Update');
    Route::post('Blog/update/save',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'UpdateSave'])->name('SupUserBlog.UpdateSave');
    Route::post('Blog/delete',[App\Http\Controllers\Administrator\Blog\BlogController::class, 'delete'])->name('SupUserBlog.delete');

    // end blog section

    //contact
    Route::get('contact/front',[App\Http\Controllers\Administrator\DashboardController::class, 'ContactFrontEnd'])->name('supUser.FrontEndContact');
    Route::get('contact/front/{id}/show',[App\Http\Controllers\Administrator\DashboardController::class, 'ContactFrontEndShow'])->name('supUser.FrontEndContactShow');

    Route::get('blank',[DashboardController::class, 'blank'])->name('dashboard.blank');
});