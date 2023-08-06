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
    Route::get('About-Us', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'aboutUs'])->name('frontEndIndex.about-us');
    Route::get('Our-mission-and-vission', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'missionAndVission'])->name('frontEndIndex.MissionAndVission');
    Route::get('Our-team', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'OurTeam'])->name('frontEndIndex.ourTeam');
    Route::get('Our-Concern', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'OurConcern'])->name('frontEndIndex.OurConcern');
    Route::get('our-expertise', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'ourExpertise'])->name('frontEndIndex.our-expertise');
    Route::get('strategic-partners', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'strategicPartners'])->name('frontEndIndex.strategic-partners');


    // contact 
    Route::get('Contact',[App\Http\Controllers\FrontEnd\FrontEndController::class, 'contact'])->name('frontEnd.ContactS');
    
    Route::get('User/Verify/',[App\Http\Controllers\Auth\RegisterController::class, 'verify'])->name('user.verify');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
