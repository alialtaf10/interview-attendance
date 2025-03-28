<?php

use App\Livewire\Auth\AddCandidate;
use App\Livewire\Auth\AttendanceReport;
use App\Livewire\Auth\CandidateDetails;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Auth\CandidateComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('dashboard/all-candidates', CandidateComponent::class)->name('all-candidates');
    Route::get('dashboard/attendance-report', AttendanceReport::class)->name('attendance-report');
    Route::get('dashboard/candidate-form', AddCandidate::class)->name('candidate-form');
    Route::get('/candidate-details/{candidateId}', CandidateDetails::class)->name('candidate.details');
    Route::post('/attendance/checkin/{candidate_id}', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');
    Route::post('/attendance/checkout/{candidate_id}', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');
    Route::post('/attendance/absent/{candidate_id}', [CandidateController::class, 'markAbsent'])->name('attendance.absent');

});

require __DIR__.'/auth.php';
