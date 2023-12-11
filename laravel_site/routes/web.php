<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/post-details', function () {
    return view('post_details');
});

Route::any('/contact', function () {
    return view('contact');
});

Route::any('/admin', [App\Http\Controllers\Admin\Syslog::class, 'index'])->name('syslog');
Route::any('/admin/login', [App\Http\Controllers\Admin\Syslog::class, 'login'])->name('syslog.login');
Route::any('/admin/logout', [App\Http\Controllers\Admin\Syslog::class, 'logout'])->name('syslog.logout');
Route::any('/admin/users', [App\Http\Controllers\Admin\Syslog::class, 'users'])->name('syslog.users');
Route::any('/admin/users/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'users'])->name('syslog.users.{action}.{id}');
Route::any('/admin/categories', [App\Http\Controllers\Admin\Syslog::class, 'categories'])->name('syslog.categories');
Route::any('/admin/categories/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'categories'])->name('syslog.categories.{action}.{id}');
Route::any('/admin/contact', [App\Http\Controllers\Admin\Syslog::class, 'contact'])->name('syslog.contact');
Route::any('/admin/contact/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'contact'])->name('syslog.contact.{action}.{id}');
Route::any('/admin/roles', [App\Http\Controllers\Admin\Syslog::class, 'roles'])->name('syslog.roles');
Route::any('/admin/roles/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'roles'])->name('syslog.roles.{action}.{id}');
Route::any('/admin/settings/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'settings'])->name('syslog.settings');



