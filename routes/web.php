<?php

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

use App\User;
use App\Classroom;
use App\Student;
use App\Role;
use App\TypeOfPayment;

Route::get('/', function () {
    return redirect(route('public->home'));
});

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('create/admin', function () {
        $superAdmin = User::whereName('Super Admin')->first();
        if (empty($superAdmin)) {
            $admin = User::create([
                'name' => 'Super Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role_id' => 1,
                'is_active' => 1
            ]);
            $roleAdmin = Role::create([
                'role_name' => 'Admin'
            ]);
            Alert::success($admin->name, 'Has Been Created, Username is (admin), Password is (admin)!');
            return redirect()->back();
        } else {
            $superAdmin = User::whereName('Super Admin')->first();
            Alert::info($superAdmin->name, 'Has Been Registered, You Cant Make It Again!');
            return redirect()->back();
        }
    });
    Route::view('login', 'auth._login')->name('auth->login');
    Route::post('login', 'AuthController@loginUser')->name('auth=>login');
    Route::view('register', 'auth._register')->name('auth->register')->middleware('auth');
    Route::post('register', 'AuthController@createUser')->name('auth=>register');
    Route::post('logout', 'AuthController@logout')->name('auth=>logout');
    Route::get('change/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('auth._change', compact('user'));
    })->name('auth->changeUser')->middleware('auth');
    Route::delete('fired/{id}', 'AuthController@firedUser')->name('auth=>firedUser');
    Route::post('change/{id}', 'AuthController@changeUser')->name('auth=>changeUser');
    Route::post('status/{id}', 'AuthController@changeStatus')->name('auth=>changeStatus');
});

// Skarisa
Route::group(['prefix' => 'skarisa'], function () {
    Route::get('dashboard', 'DashboardController@infoPage')->name('skarisa->dashboard');
    // classroom
    Route::get('classrooms', 'ClassroomController@infoClass')->name('skarisa->classrooms');
    Route::view('classrooms/add', 'skarisa._classroom_add')->name('skarisa->addClass');
    Route::post('classrooms/add', 'ClassroomController@createClass')->name('skarisa=>createClass');
    Route::get('classrooms/changeClass/{id}', function ($id) {
        $classroom = Classroom::findOrFail($id);
        return view('skarisa._classroom_change', compact('classroom'));
    })->name('skarisa->changeClass');
    Route::post('classrooms/changeClass/{id}', 'ClassroomController@changeClass')->name('skarisa=>changeClass');
    Route::delete('classrooms/delete/{id}', 'ClassroomController@deleteClass')->name('skarisa=>deleteClass');
    // role
    Route::get('roles', function () {
        $roles = Role::get();
        return view('skarisa._role', compact('roles'));
    })->name('skarisa->roles');
    Route::view('roles/add', 'skarisa._role_add')->name('skarisa->addRole');
    Route::post('roles/add', 'RoleController@createRole')->name('skarisa=>createRole');
    Route::delete('roles/delete/{id}', 'RoleController@deleteRole')->name('skarisa=>deleteRole');
    // student
    Route::get('students', 'StudentController@infoStudent')->name('skarisa->students');
    Route::view('students/add', 'skarisa._student_add')->name('skarisa->addStudent');
    Route::post('students/add', 'StudentController@addStudent')->name('skarisa=>addStudent');
    Route::delete('students/delete/{id}', 'StudentController@deleteStudent')->name('skarisa=>deleteStudent');
    Route::get('students/changeStudent/{id}', function ($id) {
        $student = Student::findOrFail($id);
        return view('skarisa._student_change', compact('student'));
    })->name('skarisa->changeStudent');
    Route::post('students/changeStudent/{id}', 'StudentController@changeStudent')->name('skarisa=>changeStudent');
    // Payment
    Route::get('payments', 'PaymentController@infoPayment')->name('skarisa->payments');
    Route::get('payment/order/{id}', 'PaymentController@orderPaymentInfo')->name('skarisa->orderPayment');
    Route::post('payment/order/{id}', 'PaymentController@orderPayment')->name('skarisa=>orderPayment');
    // TypeOfPayment
    Route::get('type-payments', 'TypeOfPaymentController@infoTypePayment')->name('skarisa->typePayment');
    Route::view('type-payments/add', 'skarisa._type_payment_add')->name('skarisa->addTypePayment');
    Route::post('type-payments/add', 'TypeOfPaymentController@createTypePayment')->name('skarisa=>addTypePayment');
    Route::delete('type-payments/delete/{id}', 'TypeOfPaymentController@deleteTypePayment')->name('skarisa=>deleteTypePayment');
    // HistoryPayment
    Route::get('history-payment', 'PaymentController@infoHistory')->name('skarisa->historyPayment');
    Route::get('history-payment/detail/{id}', 'PaymentController@detailPayment')->name('skarisa->detailPayment');
});

// Public
Route::group(['prefix' => 'public'], function () {
    Route::get('/home', function () {
        $students = Student::get();
        $classrooms = Classroom::get();
        $payments = TypeOfPayment::get();
        return view('public._index', compact('students', 'classrooms', 'payments'));
    })->name('public->home');
    Route::get('student/{id}', 'PublicController@infoStudent')->name('public->infoStudent');
});
