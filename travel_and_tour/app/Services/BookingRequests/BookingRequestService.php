<?php

namespace App\Services\BookingRequests;

use App\Dao\BookingRequests\BookingRequestDao;

class  BookingRequestService
{
  /**
  * @var $bookingRequestDao
  */
  private $bookingRequestDao;
  /**
   * Create booking request constructor.
   */
  public function __construct() {
    $this->bookingRequestDao = new BookingRequestDao();
  }
  /**
  * Display admin to approve booking request list.
  * @param $id
  * @param $status
  * @return \App\Http\Controllers\Admin\AdminBookingRequestController
  */
  public function bookingApprove($id, $status) {
    return $this->bookingRequestDao->bookingApprove($id, $status);
  }
  /**
  * To display booking request list.
  * @return \App\Http\Controllers\Admin\AdminBookingRequestController
  */
  public function getBookingRequestList() {
    return $this->bookingRequestDao->getBookingRequestList();
  }
  /**
  * To display booking list.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminBookingRequestController
  */
  public function getBookingData($id) {
    return $this->bookingRequestDao->getBookingData($id);
  }

}
