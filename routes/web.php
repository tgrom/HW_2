<?php
use App\Http\Controllers\NewsControllers;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Account\IndexCController as AccountController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
    return view('welcome');
});


Route::get('/news', [NewsControllers::class, 'index'])
->name('news');

Route::get('news/{id}', [NewsControllers::class, 'show'])->
where('id', '\d+')
->name('news.show');

Route::get('category', [Category::class, 'index']);


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', AccountController::class)->name('index');
        Route::get('logout', function () {
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });

    Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/', AdminController::class)->name('index');



        Route::resource('categories', AdminCategoryController::class);

        Route::resource('news', AdminNewsController::class);

        Route::get('parser', ParserController::class)->name('parser');
    });

});




Route::get('collections', function () {
$array = ["A", "B", "C", "D", "E", "F"];
$collection = collect($array);
dd($collection->map(function ($item) {
    return "Буква: ".$item;
}));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Вход через соц сети
Route::group(['middlewsre' => 'guest'], function () {
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
