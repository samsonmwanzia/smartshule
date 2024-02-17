<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

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
    return view('auth.login');
});

Route::get('/', [
    'uses' => 'App\Http\Controllers\PageController@index',
    'as' => 'welcome'
]);

Route::get('/admin', [
    'uses' => 'App\Http\Controllers\PageController@dashboard',
    'as' => 'index'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('smartshule/school/')->group(function () {

    Route::get('/register', [
        'uses' => 'App\Http\Controllers\PageController@getSchoolRegister',
        'as' => 'school.register',
    ]);

    Route::post('/register', [
        'uses' => 'App\Http\Controllers\PageController@postSchoolRegister',
        'as' => 'school.register.post',
    ]);

    Route::get('/login', [
        'uses' => 'App\Http\Controllers\PageController@getSchoolLogin',
        'as' => 'school.login',
    ]);

    Route::post('/login/post', [
        'uses' => 'App\Http\Controllers\PageController@postSchoolLogin',
        'as' => 'school.login.post',
    ]);

    Route::get('/', [
        'uses' => 'App\Http\Controllers\SchoolController@index',
        'as' => 'school.dashboard',
    ]);

    Route::get('/student/admission', [
        'uses' => 'App\Http\Controllers\SchoolController@studentAdmission',
        'as' => 'school.student.admission',
    ]);

    Route::post('/student/admission', [
        'uses' => 'App\Http\Controllers\SchoolController@postStudentAdmission',
        'as' => 'school.student.admission.post',
    ]);

    Route::get('/student/details', [
        'uses' => 'App\Http\Controllers\SchoolController@studentDetails',
        'as' => 'school.student.details',
    ]);

    Route::get('/student/analysis', [
        'uses' => 'App\Http\Controllers\SchoolController@populationAnalysis',
        'as' => 'school.population.analysis',
    ]);

    Route::get('/student/view/{id}', [
        'uses' => 'App\Http\Controllers\SchoolController@viewStudent',
        'as' => 'school.student.view',
    ]);

    Route::get('/class', [
        'uses' => 'App\Http\Controllers\SchoolController@getClass',
        'as' => 'school.class',
    ]);

    Route::post('/class', [
        'uses' => 'App\Http\Controllers\SchoolController@postClass',
        'as' => 'school.post.class',
    ]);

    Route::get('/student/category', [
        'uses' => 'App\Http\Controllers\SchoolController@getStudentCategory',
        'as' => 'school.student.category',
    ]);

    Route::post('/student/category', [
        'uses' => 'App\Http\Controllers\SchoolController@postStudentCategory',
        'as' => 'school.post.student.category',
    ]);

    Route::get('/stream', [
        'uses' => 'App\Http\Controllers\SchoolController@getClassStream',
        'as' => 'school.stream',
    ]);

    Route::post('/stream', [
        'uses' => 'App\Http\Controllers\SchoolController@postClassStream',
        'as' => 'school.post.stream',
    ]);

    Route::post('/class/sections', [
        'uses' => "App\Http\Controllers\SchoolController@getClassSections",
        'as' => 'school.class.sections',
    ]);

    Route::post('/sub_counties', [
        'uses' => "App\Http\Controllers\SchoolController@getSubCounties",
        'as' => 'school.sub_counties',
    ]);

    Route::post('/wards', [
        'uses' => "App\Http\Controllers\SchoolController@getWards",
        'as' => 'school.wards',
    ]);

    Route::get('/fee/accountants', [
        'uses' => 'App\Http\Controllers\SchoolController@getAccountants',
        'as' => 'school.accountant.list',
    ]);

    Route::post('/fee/accountants', [
        'uses' => 'App\Http\Controllers\SchoolController@postAccountant',
        'as' => 'school.accountant.post',
    ]);

    Route::get('/staff/category', [
        'uses' => 'App\Http\Controllers\SchoolController@getStaffCategory',
        'as' => 'school.staff.category',
    ]);

    Route::post('/staff/category', [
        'uses' => 'App\Http\Controllers\SchoolController@postStaffCategory',
        'as' => 'school.staff.category.post',
    ]);


    Route::get('/settings', [
        'uses' => 'App\Http\Controllers\SchoolController@settings',
        'as' => 'school.settings',
    ]);

    Route::post('/settings', [
        'uses' => 'App\Http\Controllers\SchoolController@postSettings',
        'as' => 'school.post.settings',
    ]);

    Route::get('/report/students/', [
        'uses' => 'App\Http\Controllers\SchoolController@studentReport',
        'as' => 'school.student.report',
    ]);

    Route::get('/fee/type', [
        'uses' => 'App\Http\Controllers\SchoolController@getFeeType',
        'as' => 'school.fee.type',
    ]);

    Route::post('/fee/type', [
        'uses' => 'App\Http\Controllers\SchoolController@postFeeType',
        'as' => 'school.post.fee.type',
    ]);

    Route::post('/student/fee', [
        'uses' => 'App\Http\Controllers\SchoolController@postStudentFee',
        'as' => 'school.post.student.fee',
    ]);

    Route::get('/fee/statement', [
        'uses' => 'App\Http\Controllers\SchoolController@getFeeStatement',
        'as' => 'school.fee.statement',
    ]);

    Route::get('/fee/balance_report', [
        'uses' => 'App\Http\Controllers\SchoolController@balanceFeeReport',
        'as' => 'school.fee.balance_report',
    ]);

    Route::get('/notifications', [
        'uses' => 'App\Http\Controllers\SchoolController@getNotifications',
        'as' => 'school.notifications.all',
    ]);

    Route::get('/expenses/head', [
        'uses' => 'App\Http\Controllers\SchoolController@getExpenseHead',
        'as' => 'school.expense.head',
    ]);

    Route::post('/expenses/head', [
        'uses' => 'App\Http\Controllers\SchoolController@postExpenseHead',
        'as' => 'school.expense.head.post',
    ]);

    Route::get('/expenses/list', [
        'uses' => 'App\Http\Controllers\SchoolController@getExpenseList',
        'as' => 'school.expense.list',
    ]);

    Route::post('/expenses/list', [
        'uses' => 'App\Http\Controllers\SchoolController@postExpenseList',
        'as' => 'school.expense.list.post',
    ]);

    Route::get('agent/all/read', [
        'uses' => 'App\Http\Controllers\SchoolController@readAll',
        'as' => 'school.notification.readAll',
    ]);

});

Route::prefix('smartshule/admin/')->group(function () {

    Route::get('/login', [
        'uses' => 'App\Http\Controllers\PageController@getAdminLogin',
        'as' => 'admin.login',
    ]);

    Route::post('/login/post', [
        'uses' => 'App\Http\Controllers\PageController@postAdminLogin',
        'as' => 'admin.login.post',
    ]);

    Route::get('/', [
        'uses' => 'App\Http\Controllers\AdminController@index',
        'as' => 'admin.dashboard',
    ]);

    Route::get('/student/admission', [
        'uses' => 'App\Http\Controllers\AdminController@studentAdmission',
        'as' => 'admin.student.admission',
    ]);

    Route::get('/school/settings', [
        'uses' => 'App\Http\Controllers\AdminController@settings',
        'as' => 'admin.school.settings',
    ]);

    Route::post('/school/settings', [
        'uses' => 'App\Http\Controllers\AdminController@postSettings',
        'as' => 'admin.school.post.settings',
    ]);
});

Route::get('/admin/logout', [
    'uses' => 'App\Http\Controllers\AdminController@logout',
    'as' => 'admin.logout'
]);


Route::get('/logout', [
    'uses' => 'HomeController@logout',
    'as' => 'logout'
]);


Route::get('logs', [LogViewerController::class, 'index']);
