<?php

namespace App\Services\Bookings;

use App\Dao\Bookings\BookingDao;

class BookingService {
  /**
  * @var $bookingDao
  */
  private $bookingDao;
  /**
   * Create a booking constructor.
   */
  public function __construct() {
    $this->bookingDao = new BookingDao();
  }
  /**
  * Display a listing of the booking.
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function getBookingList() {
    return $this->bookingDao->getBookingList();
  }
  /**
  * Display a listing of the package.
  * @return \App\Http\Controllers\Admin\AdminBookingController $packages
  */

  public function getPackageList() {
    return $this->bookingDao->getPackageList();
  }
  /**
  * Store a newly created booking in storage.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function storeBooking($request) {
    return $this->bookingDao->storeBooking($request);
  }
  /**
  * Display the booking list.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function showBooking($id) {
    return $this->bookingDao->showBooking($id);
  }
  /**
  * Display the specified package.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingController $packages
  */
  public function showPackage($id) {
    return $this->bookingDao->showPackage($id);
  }
  /**
  * Update the specified booking in storage.
  * @param $request
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function updateBooking($request,$id) {
    return $this->bookingDao->updateBooking($request,$id);
  }
  /**
  * Display the specified package.
  * @return \App\Http\Controllers\Admin\AdminBookingController $packages
  */
  public function getPackage() {
    return $this->bookingDao->getPackage();
  }
  /**
  * Update the specified booking in storage.
  * @param $request
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function updatePackage($request, $id) {
    return $this->bookingDao->updateBooking($request, $id);
  }
  /**
  * Remove the specified booking from storage.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function deleteBooking($id) {
    return $this->bookingDao->deleteBooking($id);
  }
  /**
  * Display booking list.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminBookingController $bookings
  */
  public function searchBooking($request) {
    return $this->bookingDao->searchBooking($request);
  }

  //for User Click booking button to store in database// show.blade.php
  /**
  * Store user's booking.
  * @param \App\Http\Controllers\User\BookingController $bookings
  */
  public function ToStoreBooking($request) {
    return $this->bookingDao->ToStoreBooking($request);
  }
  /**
  * To display booking list in user's view.
  * @return \App\Http\Controllers\User\BookingController $bookings
  */
  public function getBookingListById() {
    return $this->bookingDao->getBookingListById();
  }
  /**
  * Remove the specified booking.
  * @param $id
  * @return \App\Http\Controllers\User\BookingController $bookings
  */
  public function bookingDelete($id) {
    return $this->bookingDao->bookingDelete($id);
  }
  /**
   * checkBook with ID
   * @param   $id
   * @return \App\Http\Controllers\User\BookingController $bookings
   */
  public function checkInBook($id) {
    return $this->bookingDao->checkInBook($id);
  }
  /**
   * search checkId booking
   * @param  $request
   * @return \App\Http\Controllers\User\BookingController $bookings
   */
  public function checkInSearch($request) {
    return $this->bookingDao->checkInSearch($request);
  }
  /**
   * bookingEditUser
   * @param   $id
   * @return  \App\Http\Controllers\User\BookingController $bookings
   */
  public function bookingEditUser($id)  {
    return $this->bookingDao->bookingEditUser($id);
  }
  /**
   * updateBookingUser 
   * @param   $request
   * @param  $id
   * @return \App\Http\Controllers\User\BookingController $bookings
   */
  public function updateBookingUser($request, $id) {
    return $this->bookingDao->updateBookingUser($request,$id);
  }
}
