<?php

use Illuminate\Support\Facades\Route;

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
  return view('welcome');
});

Route::group(['middleware' => ['checkadmin']], function () {
  Route::prefix('admin')->group(function () {
    Route::get('users/search', 'Admin\AdminUserController@search')->name('users.search');
    Route::get('users','Admin\AdminUserController@index')->name('users.index');
    Route::get('users/create','Admin\AdminUserController@create')->name("users.create");
    Route::post('users','Admin\AdminUserController@store')->name("users.store");
    Route::get('users/{user}','Admin\AdminUserController@show')->name("users.show");
    Route::delete('users/{user}','Admin\AdminUserController@delete')->name("users.delete");
    Route::put('users/{user}','Admin\AdminUserController@update')->name("users.update");
    Route::get('users/{user}/edit','Admin\AdminUserController@edit')->name("users.edit");
    Route::get('requests','Admin\AdminUserRequestController@userRequest')->name("requests.index");
    Route::post('userApprove/{id}/{status}','Admin\AdminUserRequestController@userApprove')->name("users.approve");
    Route::post('requests/search', 'Admin\AdminUserRequestController@search')->name('requests.search');

    Route::get('bookings/search','Admin\AdminBookingController@search')->name('bookings.search');
    Route::get('bookings','Admin\AdminBookingController@index')->name('bookings.index');
    Route::get('bookings/create','Admin\AdminBookingController@create')->name("bookings.create");
    Route::post('bookings','Admin\AdminBookingController@store')->name("bookings.store");
    Route::get('bookings/{booking}','Admin\AdminBookingController@show')->name("bookings.show");
    Route::delete('bookings/{booking}','Admin\AdminBookingController@delete')->name("bookings.delete");
    Route::put('bookings/{booking}','Admin\AdminBookingController@update')->name("bookings.update");
    Route::get('bookings/{booking}/edit','Admin\AdminBookingController@edit')->name("bookings.edit");
    Route::get('bookingrequests','Admin\AdminBookingRequestController@bookingRequest')->name("b_requests.index");
    Route::post('bookingApprove/{id}/{status}','Admin\AdminBookingRequestController@bookingApprove')->name("bookings.approve");
    Route::get('bookingCheckIn','Admin\AdminBookingController@bookingCheckIn')->name("bookings.checkIn");
    Route::get('bookingCheckIn/search','Admin\AdminBookingController@checkInSearch')->name("checkInSearch");

    Route::get('destinations','Admin\AdminDestinationController@index')->name('destinations.index');
    Route::get('destinations/create','Admin\AdminDestinationController@create')->name("destinations.create");
    Route::get('destinations/search','Admin\AdminDestinationController@search')->name("destinations.search");
    Route::post('destinations','Admin\AdminDestinationController@store')->name("destinations.store");
    Route::get('destinations/{destination}','Admin\AdminDestinationController@show')->name("destinations.show");
    Route::delete('destinations/{destination}','Admin\AdminDestinationController@delete')->name("destinations.delete");
    Route::put('destinations/{destination}','Admin\AdminDestinationController@update')->name("destinations.update");
    Route::get('destinations/{destination}/edit','Admin\AdminDestinationController@edit')->name("destinations.edit");

    Route::get('packages','Admin\AdminPackageController@index')->name('packages.index');
    Route::get('packages/create','Admin\AdminPackageController@create')->name("packages.create");
    Route::get('packages/search','Admin\AdminPackageController@search')->name("packages.search");
    Route::post('packages','Admin\AdminPackageController@store')->name("packages.store");
    Route::get('packages/{package}','Admin\AdminPackageController@show')->name("packages.show");
    Route::delete('packages/{package}','Admin\AdminPackageController@delete')->name("packages.delete");
    Route::put('packages/{package}','Admin\AdminPackageController@update')->name("packages.update");
    Route::get('packages/{package}/edit','Admin\AdminPackageController@edit')->name("packages.edit");

    Route::get('/dashboard', 'Admin\AdminDashboardController@index')->name('dashboard');

    Route::get('reports/package','Admin\AdminReportController@package')->name('reports.package');
    Route::post('reports/package/search','Admin\AdminReportController@searchReportPackage')->name("reports.packageSearch");
    Route::post('reports/package/export','Admin\AdminReportController@packageExport')->name("reports.packageExport");

    Route::get('report/mostBookedCustomer','Admin\AdminReportController@mostBookedCustomer')->name('report.mostBookedCustomer');
    Route::post('report/bookingSearch','Admin\AdminReportController@bookingSearch')->name('report.bookingSearch');
    Route::post('report/bookingExport','Admin\AdminReportController@bookingExport')->name('report.bookingExport');

    Route::get('report/tourmonth','Admin\AdminReportController@tourMonth')->name('report.month');
    Route::post('report/search','Admin\AdminReportController@reportMonthSearch')->name('report.searchMonth');
    Route::post('report/tourmonth/export','Admin\AdminReportController@reportMonthExport')->name('reportmonth.export');

    Route::get('report/destination','Admin\AdminReportController@destination')->name('report.destination');
    Route::post('report/destination/search','Admin\AdminReportController@reportSearch')->name('reportDest.search');
    Route::post('report/destination/export','Admin\AdminReportController@reportExport')->name('reportDest.export');

    Route::get('report/yearlyFinance','Admin\AdminReportController@tourYear')->name('report.year');
    Route::post('report/yearlyFinance/search','Admin\AdminReportController@reportYearSearch')->name('report.searchYear');
    Route::post('report/yearlyFinance/export','Admin\AdminReportController@tourYearExport')->name('reportyear.export');

  });
});

Auth::routes();
Route::prefix('admin')->group(function () {
  Route::get('/','Admin\AdminLoginController@index')->name("admin");
  Route::get('/adminlogin','Admin\AdminLoginController@adminlogin')->name("adminlogin");
  Route::get('/adminlogout','Admin\AdminLoginController@adminlogout')->name("adminlogout");
});

Route::group(['middleware' => ['checkuser']], function () {
  Route::get('/', 'User\UserController@index')->name('userHome.index');
  Route::get('/about', 'User\UserController@about')->name('about.index');
  Route::get('/contact', 'User\UserController@contact')->name('contact.index');
  Route::get('/signIn', 'User\UserController@signIn')->name('signIn.index');

  Route::get('/profile', 'User\ProfileController@index')->name('profile.index')->middleware('auth');
  Route::get('/profile/{user}/edit','User\ProfileController@edit')->name('profile.edit');
  Route::put('/profile/{user}','User\ProfileController@update')->name('profile.update');

  Route::get('/booking', 'User\BookingController@booking')->name('booking.index')->middleware('auth');
  Route::delete('bookingDelete/{id}','User\BookingController@bookingDelete')->name("booking.delete")->middleware('auth');
  Route::get('booking/{id}/edit','User\BookingController@bookingEdit')->name("booking.edit")->middleware('auth');
  Route::put('/booking/{id}','User\BookingController@bookingUpdate')->name('booking.update')->middleware('auth');

  Route::post('/package/detail/{id}','User\BookingController@toStoreBooking')->name('ubooking.store');
  Route::get('package/detail/{id}','User\PackageController@showPackage')->name('show.detail');
  Route::get('/package', 'User\PackageController@package')->name('package.index');
  Route::get('/package/{id?}','User\PackageController@packageById')->name('package.indexById');

  Route::get('/destination', 'User\DestinationController@destination')->name('destination.index');
  Route::get('/destination/search','User\DestinationController@search')->name("destination.search");
  Route::get('/destination/detail/{id}', 'User\DestinationController@show')->name('destination.detail');

  Route::get('/login','User\UserLoginController@login')->name("user.login");
  Route::get('/logout','User\UserLoginController@logout')->name("user.logout");
  Route::post('/register','User\UserRegisterController@register')->name("user.register");
});

// Route::get('/profile', 'User\ProfileController@index')->name('profile.index')->middleware('auth');
// Route::get('/profile/{user}/edit','User\ProfileController@edit')->name('profile.edit');
// Route::put('/profile/{user}','User\ProfileController@update')->name('profile.update');

// Route::get('/booking', 'User\BookingController@booking')->name('booking.index')->middleware('auth');
// Route::delete('bookingDelete/{id}','User\BookingController@bookingDelete')->name("booking.delete")->middleware('auth');
// Route::post('/package/detail/{id}','User\BookingController@ToStoreBooking')->name('ubooking.store');
// Route::get('/package/detail/{id}','User\PackageController@ShowPackage')->name('show.detail');
// Route::get('/package', 'User\PackageController@package')->name('package.index');
// Route::get('/package/{id?}','User\PackageController@packageById')->name('package.indexById');
//Route::get('/logout','User\UserLoginController@logout')->name("user.logout");

Route::get('/', 'User\UserController@index')->name('userHome.index');
Route::get('/about', 'User\UserController@about')->name('about.index');
Route::get('/contact', 'User\UserController@contact')->name('contact.index');
Route::get('/login','User\UserLoginController@login')->name("user.login");
Route::get('/register','User\UserRegisterController@index')->name('register.index');
Route::post('/register','User\UserRegisterController@register')->name("user.register");
Route::get('/signIn', 'User\UserController@signIn')->name('signIn.index');
Route::get('/destination', 'User\DestinationController@destination')->name('destination.index');
Route::post('/destination/search','User\DestinationController@search')->name("destination.search");
Route::get('/destination/detail/{id}', 'User\DestinationController@show')->name('destination.detail');
Route::get('package/detail/{id}','User\PackageController@showPackage')->name('show.detail');
Route::get('/package', 'User\PackageController@package')->name('package.index');
Route::get('/package/{id?}','User\PackageController@packageById')->name('package.indexById');
