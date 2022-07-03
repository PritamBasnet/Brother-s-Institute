<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LatestController;
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

// let make an route for all the frontend part
Route::get('/', function (){
    return view('frontend.index');
});
Route::get('/about', function (){
    return view('frontend.aboutus');
});
Route::get('/contact' , function (){
    return view('frontend.contact');
});
Route::get('/detail/{slug}',[Frontend::class,'DetailPage'])->name('frontend.detail');
Route::get('/certicicate-code', function (){
    return view('frontend.certicificate_search');
});
Route::get('/certificate/search',[CertificateController::class,'filter'])->name('certificate.search');

Route::group(['middleware'=>'auth'], function (){

    // let make the route for all the backend pages
    Route::get('/brothers/admin' , function (){
        return view('backend.dashboard');
    });
    // Let make the route for all the courses page
    Route::get('/brothers/admin/courses/create',[CoursesController::class,'create'])->name('course.create');
    Route::get('/brothers/admin/courses/read',[CoursesController::class,'index'])->name('courses.read');
    // let make an route for the storing the data of the course in the database
    Route::post('/brothers/admin/courses/store',[CoursesController::class,'store'])->name('courses.store');
    Route::get('/brothers/admin/courses/destroy/{id}',[CoursesController::class,'destroy'])->name('course.destroy');
    Route::get('/brothers/admin/courses/edit/{id}',[CoursesController::class,'edit'])->name('courses.edit');
    Route::post('/brothers/admin/courses/update/{id}',[CoursesController::class,'update'])->name('courses.update');

    // let make the route for the contact us page
    Route::get('/brothers/admin/contact/read',[ContactController::class,'index'])->name('contact.read');
    Route::post('/contact/message/store',[ContactController::class,'store'])->name('contact.store');
    Route::get('/contact/destroy/{id}',[ContactController::class,'destroy'])->name('contact.delete');

    // Let make the route for the certificate
    Route::get('/brothers/admin/certicate/create',[CertificateController::class,'create'])->name('certificate.create');
    Route::get('/brothers/admin/certificate/index',[CertificateController::class,'index'])->name('certificate.read');
    Route::post('/brothers/admin/certificate/store',[CertificateController::class,'store'])->name('certificate.store');
    Route::get('/brothers/admin/certificate/destroy/{id}',[CertificateController::class,'destroy'])->name('certificate.destroy');
    Route::get('/brothers/admin/certificate/edit/{id}',[CertificateController::class,'edit'])->name('certificate.edit');
    Route::post('.brothers/admin/certificate/update/{id}',[CertificateController::class,'update'])->name('certificate.update');

    // Let make the route for  the latest
    Route::get('/brothers/admin/latest/create',[LatestController::class,'create'])->name('latest.create');
    Route::get('/brothers/admin/latest/index',[LatestController::class,'index'])->name('latest.index');
    Route::post('/brothers/admin/latest/store',[LatestController::class,'store'])->name('latest.store');
    Route::get('/brothers/admin/latest/destroy/{id}',[LatestController::class,'destroy'])->name('latest.delete');
    Route::get('/brothers/admin/latest/edit/{id}',[LatestController::class,'edit'])->name('latest.edit');
    Route::post('/brothers/admin/latest/update/{id}',[LatestController::class,'update'])->name('latest.update');

});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
