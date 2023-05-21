<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/',[\App\Http\Controllers\HomeController::class,"index"])->name("index");
Route::get('/about',[\App\Http\Controllers\HomeController::class,"about"])->name("about");
Route::get('/contact',[\App\Http\Controllers\HomeController::class,"contact"])->name("contact");
Route::post('/contactstore',[\App\Http\Controllers\HomeController::class,"contactstore"])->name("contactstore");
Route::get('/blog',[\App\Http\Controllers\HomeController::class,"blog"])->name("blog");
Route::get('/blogsingle/{id}',[\App\Http\Controllers\HomeController::class,"blogsingle"])->name("blogsingle");
Route::get('/blogcategory/{id}',[\App\Http\Controllers\HomeController::class,"blogcategory"])->name("blogcategory");
Route::post('/comment',[\App\Http\Controllers\HomeController::class,"comment"])->name("comment");
Route::view("/loginuser","login")->name("loginuser");;
Route::view("/registeruser","register")->name("registeruser");
Route::get('/logoutuser',[\App\Http\Controllers\HomeController::class,"logout"])->name("logoutuser");
Route::view("/loginadmin","Admin/login")->name("loginadmin");;
Route::post('/loginadmincheck',[\App\Http\Controllers\HomeController::class,"loginadmincheck"])->name("loginadmincheck");




    Route::prefix('userx')->group(function (){
        Route::get('/',[\App\Http\Controllers\UserController::class,"index"])->name("index");
        Route::get('/comment',[\App\Http\Controllers\UserController::class,"comments"])->name("comments");
        Route::get('/destroy/{id}',[\App\Http\Controllers\UserController::class,"destroy"])->name("destroy");
        Route::get('/blog',[\App\Http\Controllers\UserController::class,"create"])->name("create");
        Route::post('/addblog',[\App\Http\Controllers\UserController::class,"addblog"])->name("addblog");

});






Route::middleware('auth')->prefix('admin')->group(function () {


#admin routers
Route::middleware('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\AdminController::class,"index"])->name("index");
    Route::get('/users',[\App\Http\Controllers\AdminController::class,"users"])->name("users");
    Route::get('/setting',[\App\Http\Controllers\AdminController::class,"setting"])->name("setting");
    Route::post('/settingupdate',[\App\Http\Controllers\AdminController::class,"settingUpdate"])->name("settingUpdate");


    #category routers
    Route::prefix('category')->name("category.")->controller(\App\Http\Controllers\CategoryController::class)->group(function (){

        Route::get('/',"index")->name("index");
        Route::get('/create',"create")->name("create");
        Route::post('/add',"store")->name("store");
        Route::get('/edit/{id}',"edit")->name("edit");
        Route::post('/update/{id}',"update")->name("update");
        Route::get('/show/{id}',"show")->name("show");
        Route::get('/destroy/{id}',"destroy")->name("destroy");

    });


    #blog routers
    Route::prefix('/blog')->name("blog.")->controller(\App\Http\Controllers\BlogController::class)->group(function (){

        Route::get('/',"index")->name("index");
        Route::get('/create',"create")->name("create");
        Route::post('/add',"store")->name("store");
        Route::get('/edit/{id}',"edit")->name("edit");
        Route::post('/update/{id}',"update")->name("update");
        Route::get('/show/{id}',"show")->name("show");
        Route::get('/destroy/{id}',"destroy")->name("destroy");

    });


    #image routers
    Route::prefix('/image')->name("image.")->controller(\App\Http\Controllers\ImageController::class)->group(function (){

        Route::get('/{pid}',"index")->name("index");
        Route::post('/add/{pid}',"store")->name("store");
        Route::get('/destroy/{pid}/{id}',"destroy")->name("destroy");

    });


    #message routers
    Route::prefix('/message')->name("message.")->controller(\App\Http\Controllers\MessageController::class)->group(function (){

        Route::get('/',"index")->name("index");
        Route::post('/update/{id}',"update")->name("update");
        Route::get('/show/{id}',"show")->name("show");
        Route::get('/destroy/{id}',"destroy")->name("destroy");

    });


    #comment routers
    Route::prefix('/comment')->name("comment.")->controller(\App\Http\Controllers\CommentController::class)->group(function (){

        Route::get('/',"index")->name("index");
        Route::post('/update/{id}',"update")->name("update");
        Route::get('/show/{id}',"show")->name("show");
        Route::get('/destroy/{id}',"destroy")->name("destroy");

    });


    #user routers
    Route::prefix('/user')->name("user.")->controller(\App\Http\Controllers\AdminUserController::class)->group(function (){

        Route::get('/',"index")->name("index");
        Route::post('/edit/{id}',"edit")->name("edit");
        Route::post('/update/{id}',"update")->name("update");
        Route::get('/show/{id}',"show")->name("show");
        Route::get('/destroy/{id}',"destroy")->name("destroy");
        Route::post('/addrole/{id}',"addrole")->name("addrole");
        Route::get('/destroyrole/{uid}/{rid}',"destroyrole")->name("destroyrole");
    });

});});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
