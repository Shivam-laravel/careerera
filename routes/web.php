<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::post('query-submit',[QueryController::class,'querysubmit'])->name('query.submit');
Route::post('query',[QueryController::class,'index']);



Route::get('admin',[AdminController::class,'login']);
Route::post('admin',[AdminController::class,'loginauth'])->name('admin.login');
Route::post('logout', function () {
    session()->forget('PROGRAM_MANAGER_LOGIN');
    session()->flash('error','Logout sucessfully');
    return redirect('admin');
})->middleware('admin')->name('logout');
Route::get('home/dashboard',[AdminController::class,'dashboard'])->middleware('admin');

Route::get('home/tickets/{issueid}',[TicketController::class,'singleticket'])->middleware('admin');
Route::get('home/open-tickets',[TicketController::class,'opentickets'])->middleware('admin');
Route::get('home/open-tickets-hours',[TicketController::class,'openticketshours'])->middleware('admin');
Route::get('home/close-tickets',[TicketController::class,'closetickets'])->middleware('admin');

Route::post('update/status',[TicketController::class,'status'])->middleware('admin')->name('update.status');
Route::post('add/comment',[CommentController::class,'store'])->middleware('admin')->name('add.comment');



//superadmin
Route::get('superadmin',[SuperadminController::class,'login']);
Route::post('superadmin',[SuperadminController::class,'loginauth'])->name('superadmin.login');
Route::get('superadmin/dashboard',[SuperadminController::class,'dashboard'])->middleware('superadmin');
Route::get('superadmin/open-tickets',[SuperadminController::class,'opentickets'])->middleware('superadmin');
Route::get('superadmin/close-tickets',[SuperadminController::class,'closetickets'])->middleware('superadmin');
Route::get('superadmin/tickets',[SuperadminController::class,'tickets'])->middleware('superadmin');
Route::get('superadmin/tickets/{issueid}',[SuperadminController::class,'singleticket'])->middleware('superadmin');

Route::post('signout', function () {
    session()->forget('SUPERADMIN_LOGIN');
    session()->flash('error','Logout sucessfully');
    return redirect('superadmin');
})->middleware('superadmin')->name('signout');


