<?php

use App\Exports\FormResponseExport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('index');
});


Route::get('/export-response', function (Request $request) {
    $password = $request->password;
    if ($password !== env('EXPORT_PASSWORD', 'password')) {
        return redirect('/')->with('error', 'Invalid password.');
    }
    return Excel::download(new FormResponseExport, 'form-response.xlsx');
})->name('response.export');

Route::post('/response', [SurveyController::class, 'storeResponse'])->name('response.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/survey', [SurveyController::class, 'index'])->name('survey');

//     Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
// });

require __DIR__ . '/auth.php';
