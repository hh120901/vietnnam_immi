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

Route::any('/', [App\Http\Controllers\Home::class, 'index'])->name('home');
Route::any('/contact', [App\Http\Controllers\Contact::class, 'index'])->name('contact');
Route::any('/search', [App\Http\Controllers\SearchPost::class, 'index'])->name('contact');

Route::any('/admin', [App\Http\Controllers\Admin\Syslog::class, 'index'])->name('syslog');
Route::any('/admin/login', [App\Http\Controllers\Admin\Syslog::class, 'login'])->name('syslog.login');
Route::any('/admin/logout', [App\Http\Controllers\Admin\Syslog::class, 'logout'])->name('syslog.logout');
Route::any('/admin/users', [App\Http\Controllers\Admin\Syslog::class, 'users'])->name('syslog.users');
Route::any('/admin/users/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'users'])->name('syslog.users.{action}.{id}');
Route::any('/admin/categories', [App\Http\Controllers\Admin\Syslog::class, 'categories'])->name('syslog.categories');
Route::any('/admin/categories/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'categories'])->name('syslog.categories.{action}.{id}');
Route::any('/admin/banners', [App\Http\Controllers\Admin\Syslog::class, 'banners'])->name('syslog.banners');
Route::any('/admin/banners/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'banners'])->name('syslog.banners.{action}.{id}');
Route::any('/admin/category/{category_id}/posts', [App\Http\Controllers\Admin\Syslog::class, 'posts'])->name('syslog.posts');
Route::any('/admin/category/{category_id}/posts/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'posts'])->name('syslog.{category_id}.posts.{action}.{id}');
Route::any('/admin/contact', [App\Http\Controllers\Admin\Syslog::class, 'contact'])->name('syslog.contact');
Route::any('/admin/contact/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'contact'])->name('syslog.contact.{action}.{id}');
Route::any('/admin/roles', [App\Http\Controllers\Admin\Syslog::class, 'roles'])->name('syslog.roles');
Route::any('/admin/roles/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'roles'])->name('syslog.roles.{action}.{id}');
Route::any('/admin/settings/{action}/{id?}', [App\Http\Controllers\Admin\Syslog::class, 'settings'])->name('syslog.settings');
Route::any('/{alias}/{post_slug?}', [App\Http\Controllers\ShowCategory::class, 'index'])->name('category.{alias}.{post_slug}');


