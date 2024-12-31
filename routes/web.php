<?php

use App\Http\Controllers\{
    HomeController,
    ManuscriptController,
    UserController,
    ChangePasswordController,
    JournalController,
    ArchiveController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {return view('home');})->middleware(['auth', 'verified'])->name('');
// layout
// Route::get('/home', 'HomeController@index')->name('home');




// Manuscript Submission
Route::middleware(['auth'])->group(function () {
    Route::get('/manuscript_submission', [ManuscriptController::class, 'index'])->name('manuscript.index');
    Route::post('/manuscript_submission', [ManuscriptController::class, 'create_manuscript'])->name('manuscript.store');
});
// Route::get('/manuscript_submission', [ManuscriptController::class, 'index']);
// Route::get('/manuscript_submission', [ManuscriptController::class, 'create_manuscript']);

// Dependent form topic
Route::get('myform/ajax/{id}', [ManuscriptController::class, 'getTopic'])->name('myform.ajax');

// Manuscript List for all users
Route::get('/manuscript-list', [ManuscriptController::class, 'manuscript_list']);

// Editor journal list
Route::get('/editor-journal-list', [ManuscriptController::class, 'editor_journal_list']);

// Journalwise manuscript list
Route::get('/journalwise-manuscript-list/{id}', [ManuscriptController::class, 'journalwise_manuscript_list']);

// Journalwise reviewer selection by editor
Route::post('/editor-journal-list', [ManuscriptController::class, 'Editor_reviewer_selection']);

// Reviewer selection by admin
Route::post('/reviewer-selection', [ManuscriptController::class, 'reviewer_selection']);

// Add Topic
Route::get('/add-topic', [ManuscriptController::class, 'add_topic']);
Route::post('/add-topic', [ManuscriptController::class, 'store_topic']);

// Manuscript Details for Author
Route::get('/manuscript-details/{id}', [ManuscriptController::class, 'manuscript_details'])->name('manuscript_details');

// Manuscript List for Assigned Reviewer
Route::get('/review-manuscript', [ManuscriptController::class, 'review_manuscript_list']);

// Manuscript Details for Assigned Reviewer
Route::get('/reviewer-manuscript-details/{id}', [ManuscriptController::class, 'reviewer_manuscript_details'])->name('reviewer-manuscript-details');

// Create Comment by Reviewer
Route::put('/reviewer-comment/{id}', [ManuscriptController::class, 'store_reviewer_comment']);

// Attach updated file by Author
Route::put('/attache-updated-file/{id}', [ManuscriptController::class, 'store_updated_file']);

// Comment send to Author by Editor
Route::put('/editor-comment/{id}', [ManuscriptController::class, 'store_editor_comment']);

// Update Status by Admin
Route::put('/manuscript-details/{id}', [ManuscriptController::class, 'store_update_status']);

// Add Role
Route::get('/create-user-role', [UserController::class, 'create_user_role']);
Route::post('/create-user-role', [UserController::class, 'store_user_role']);

// Add User
Route::get('/create-user', [UserController::class, 'create_user']);
Route::post('/create-user', [UserController::class, 'store_user']);

// User Profile
Route::get('/user-profile', [UserController::class, 'user_profile']);
Route::put('/user-profile', [UserController::class, 'update_user_profile']);

// Change Password
// Route::get('/change-password', [ChangePasswordController::class, 'password']);
// Route::post('/change-password', [ChangePasswordController::class, 'change_password']);

// Store Reviewer
Route::post('/create-reviewer', [UserController::class, 'store_reviewer']);

// Reviewer List
Route::get('/reviewer-list', [UserController::class, 'reviewer_list']);

// Author List
Route::get('/author-list', [UserController::class, 'author_list']);

// Create, Store & View Journal
Route::get('/create-journal', [JournalController::class, 'create_journal']);
Route::post('/create-journal', [JournalController::class, 'store_journal']);
Route::get('/journal-list', [JournalController::class, 'journal_list']);

// Create, Store & View Volume
Route::get('/create-volume', [ArchiveController::class, 'create_volume']);
Route::post('/create-volume', [ArchiveController::class, 'store_volume']);
Route::get('/delete-volume/{id}', [ArchiveController::class, 'destroy_volume']);

// Create, Store, View & Delete Archive by Editor
Route::get('/create-archive', [ArchiveController::class, 'create_archive']);
Route::post('/create-archive', [ArchiveController::class, 'store_archive']);
Route::get('/archive-list', [ArchiveController::class, 'archive_list']);
Route::get('/delete-archive/{id}', [ArchiveController::class, 'destroy_archive']);

// Create, Store, View & Delete Archive by Admin
Route::get('/create-admin-archive', [ArchiveController::class, 'create_admin_archive']);
Route::get('/admin-archive-list', [ArchiveController::class, 'admin_archive_list']);
Route::post('/create-admin-archive', [ArchiveController::class, 'store_admin_archive']);
Route::get('/delete-admin-archive/{id}', [ArchiveController::class, 'destroy_admin_archive']);

// Dependent form topic
Route::get('volume_myform/ajax/{id}', [ArchiveController::class, 'getVolume'])->name('myform.ajax');

// Create, Store & Delete Issue
Route::get('/create-issue', [ArchiveController::class, 'create_issue']);
Route::post('/create-issue', [ArchiveController::class, 'store_issue']);
Route::get('/delete-issue/{id}', [ArchiveController::class, 'destroy_issue']);
