<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CrimeReportController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CrimeTypeController;
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

    Route::controller(RoleController::class)->group(function () {
        Route::get('index', 'index');
    })->middleware('auth');

    Route::controller(CrimeTypeController::class)->group(function () {
        Route::get('fetchdistricts/{regionId}', 'fetchdistricts')->name('fetchdistricts');
        Route::get('fetchwards/{districtId}', 'fetchwards')->name('fetchwards');
        Route::get('fetchstreets/{wardId}', 'fetchstreets')->name('fetchstreets');
        Route::get('fetchplaces/{streetId}', 'fetchplaces')->name('fetchplaces');

        Route::get('crimeTypes/index', 'index');
        Route::get('crimeTypes/add_crime_type', 'add_crime_type');
        Route::post('crimeTypes/submit_crime_type', 'submit_crime_type')->name('crimeTypes/submit_crime_type');

        Route::get('report_new_crime', 'report_new_crime');
        Route::post('report_new_crime_action', 'report_new_crime_action')->name('report_new_crime_action');

        Route::get('case_reported', 'case_reported');
        Route::get('update_case_status/{id}', 'update_case_status');
        Route::post('update_case_status/update_case_status_action', 'update_case_status_action')->name('update_case_status_action');
    })->middleware('auth');

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'user');
    })->middleware('auth');
