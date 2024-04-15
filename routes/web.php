<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CrimeReportController;
    use App\Http\Controllers\RoleController;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('auth/login');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crime_report', [App\Http\Controllers\CrimeReportController::class, 'crime_report'])->name('crime_report');
    Route::RoleController('role/index')->group(function () {
        Route::get('roles/index', 'index')->name('roles/index');
    })->middleware('auth');

