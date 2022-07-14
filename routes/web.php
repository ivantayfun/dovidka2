<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrozzController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\PostOfficeBoxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/logout',
    [ContactController::class, 'logout'])->middleware(['auth'])->name('logout');
Route::get('/',
    [ContactController::class, 'index'])->middleware(['auth'])->name('main');
/*Route::get('/kross',
    [CrozzController::class, 'index'])->name('main');*/


Route::get('/fetch_data',
    [ContactController::class, 'fetch_data'])->middleware(['auth'])->name('mainfetch_data');
Route::post('/',
    [ContactController::class, 'add'])->middleware(['auth'])->name('mainadd');
Route::post('/contactupdate',
    [ContactController::class, 'update'])->middleware(['auth'])->name('contactupdate');
/*
function () {
    return view('crozz.main');
})->name('home');*/



Route::get('/position',
    [CrozzController::class, 'position'])->middleware(['auth'])->name('position');

Route::get('/description',
    [DescriptionController::class, 'description'])->middleware(['auth'])->name('description');
Route::post('/descriptionadd',
    [DescriptionController::class, 'descriptionadd'])->middleware(['auth'])->name('descriptionadd');

Route::post('/descriptionupdate',
    [DescriptionController::class, 'descriptionupdate'])->middleware(['auth'])->name('descriptionupdate');
Route::post('/descriptionsorted',
    [DescriptionController::class, 'descriptionsorted'])->middleware(['auth'])->name('descriptionsorted');

Route::get('/company',
    [CompanyController::class, 'company'])->middleware(['auth'])->name('company');

Route::post('/company',
    [CompanyController::class, 'companyadd'])->middleware(['auth'])->name('companyadd');

Route::post('/companyupdate',
    [CompanyController::class, 'companyupdate'])->middleware(['auth'])->name('companyupdate');
Route::post('/companysorted',
    [CompanyController::class, 'companysorted'])->middleware(['auth'])->name('companysorted');



Route::get('/post_office_box',
    [PostOfficeBoxController::class, 'index'])->middleware(['auth'])->name('post_office_box');

Route::post('/post_office_box',
    [PostOfficeBoxController::class, 'add'])->middleware(['auth'])->name('post_office_boxadd');

Route::post('/post_office_boxupdate',
    [PostOfficeBoxController::class, 'update'])->middleware(['auth'])->name('post_office_boxupdate');

Route::get('/user',
    [UserController::class, 'index'])->middleware(['auth'])->name('user');
Route::post('/user',
    [UserController::class, 'add'])->middleware(['auth'])->name('useradd');
Route::post('/userupdate',
    [UserController::class, 'userupdate'])->middleware(['auth'])->name('userupdate');
Route::get('/userfetch_data',
    [UserController::class, 'fetch_data'])->middleware(['auth'])->name('userfetch_data');

Route::get('/department', function () {
    return view('crozz.department');
})->middleware(['auth'])->name('department');




Route::get('/dashboard', function () {
    return redirect('/');
    //return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';

/*Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
