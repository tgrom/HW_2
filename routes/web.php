<?php
use App\Http\Controllers\NewsControllers;
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

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::get('/', AdminController::class)->name('index');



    Route::resource('categories', AdminCategoryController::class);

    Route::resource('news', AdminNewsController::class);
});


Route::get('collections', function () {
$array = ["A", "B", "C", "D", "E", "F"];
$collection = collect($array);
dd($collection->map(function ($item) {
    return "Буква: ".$item;
}));
});
