<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Manajemen Data Guru (Action Controller)
Route::name('teachers.')->prefix('teachers')->group(function() {
//Halaman Daftar Guru
Route::get('/', [TeacherController::class, 'index'])->name('index');

//Halaman Detail Guru
Route::get('/{id}', [TeacherController::class, 'show'])->name('show')->whereNumber('id');

//Halaman Tambah Guru
Route::get('/create', [TeacherController::class, 'create'])->name('create');

//Halaman Edit Guru
Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit')->whereNumber('id');

//Logika Tambah Guru
Route::post('/', [TeacherController::class, 'store'])->name('store');

//Logika Edit Guru
Route::put('/{id}', [TeacherController::class, 'update'])->name('update')->whereNumber('id');

//Logika Hapus Guru
Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy')->whereNumber('id');
});

//Manajemen Data Siswa (Action Controller)
Route::name('students.')->prefix('students')->group(function() {
//Halaman Daftar Siswa
Route::get('/', [StudentController::class, 'index'])->name('index');

//Halaman Detail Siswa
Route::get('/{student}', [StudentController::class, 'show'])->name('show')->whereNumber('student');

//Halaman Tambah Siswa
Route::get('/create', [StudentController::class, 'create'])->name('create');

//Halaman Edit Siswa
Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit')->whereNumber('student');

//Logika Tambah Siswa
Route::post('/', [StudentController::class, 'store'])->name('store');

//Logika Edit Siswa
Route::put('/{student}', [StudentController::class, 'update'])->name('update')->whereNumber('student');

//Logika Hapus Siswa
Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy')->whereNumber('student');
});

//Manajemen Data SchoolClass (Invokable)
Route::name('schoolclasses.')->prefix('schoolclasses')->group(function () {
    Route::get('/', IndexController::class)->name('index');
 
    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');
 
    Route::get('/create', CreateController::class)->name('create');
 
    Route::get('/{id}/edit', EditController::class)->name('edit')->whereNumber('id');
 
    Route::post('/', StoreController::class)->name('store');
 
    Route::put('/{id}', UpdateController::class)->name('update')->whereNumber('id');
 
    Route::delete('/{id}', DestroyController::class)->name('destroy')->whereNumber('id');
});
 
//Manajemen Data Kelas (Resource)
Route::resource('majors', MajorController::class);