<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\FrontEndController;

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
    return redirect()->route('frontEndIndex');
});
Route::get('en', function(){
    return redirect()->route('frontEndIndex');
});

Route::middleware(['middleware'=>'preventbackhistory'])->group(function(){
    Auth::routes();
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('en')->middleware(['guest:web'])->group(function(){
    Route::get('Index', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index'])->name('frontEndIndex');

    //about us
    Route::get('About-Us', [App\Http\Controllers\FrontEnd\AboutController::class, 'aboutUs'])->name('frontEndIndex.about-us');
    Route::get('About-Us/Our-mission-and-vission', [App\Http\Controllers\FrontEnd\AboutController::class, 'missionAndVission'])->name('frontEndIndex.MissionAndVission');
    Route::get('About-Us/Our-team', [App\Http\Controllers\FrontEnd\AboutController::class, 'OurTeam'])->name('frontEndIndex.ourTeam');
    Route::get('About-Us/Our-Concern', [App\Http\Controllers\FrontEnd\AboutController::class, 'OurConcern'])->name('frontEndIndex.OurConcern');
    Route::get('About-Us/our-expertise', [App\Http\Controllers\FrontEnd\AboutController::class, 'ourExpertise'])->name('frontEndIndex.our-expertise');
    Route::get('About-Us/strategic-partners', [App\Http\Controllers\FrontEnd\AboutController::class, 'strategicPartners'])->name('frontEndIndex.strategic-partners');



    Route::get('Project/On-going',[App\Http\Controllers\FrontEnd\ProjectController::class, 'onGoingProject'])->name('FrontEnd.OnGoingProject');
    Route::get('Project/Complete/{project_cate_slug}',[App\Http\Controllers\FrontEnd\ProjectController::class, 'CompleteProjectList'])->name('FrontEnd.CompleteProjectShow');

    Route::get('Project/Complete/Details/{project_slug}',[App\Http\Controllers\FrontEnd\ProjectController::class, 'ProjectDetailsShow'])->name('FrontEnd.ProjectDetailsShow');

    // contact 
    Route::get('Contact',[App\Http\Controllers\FrontEnd\FrontEndController::class, 'contact'])->name('frontEnd.ContactS');
    
    Route::get('User/Verify/',[App\Http\Controllers\Auth\RegisterController::class, 'verify'])->name('user.verify');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
