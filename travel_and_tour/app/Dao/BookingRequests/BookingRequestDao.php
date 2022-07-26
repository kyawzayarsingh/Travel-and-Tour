<?php
namespace App\Dao\BookingRequests;
use App\Booking;
use App\Destination;
use App\Package;

class BookingRequestDao {
  /**
   * Approvement of bookings
   * @param  int $id     Booking_Id for Approvement
   * @param  int $status To give status for accept or reject
   * @return \App\Services\BookingRequestService $booking
   */
  public function bookingApprove($id,$status) {
    $booking = Booking::find($id);
    $booking->status= $status;
    $booking->save();
    return $booking;
  }
  /**
   * Get the list of Bookings that is no Approvement
   * @return \App\Services\BookingRequestService $booking
   */
  public function getBookingRequestList() {
    $booking = Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","users.email as user_email","users.name as user_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("users","users.id","=","bookings.create_user_id")
    ->where('bookings.status',0)->paginate(10);
    return $booking;
  }
  /**
   *Accept booking list to reply email if the booking accepted
   * @param   int $id   Booking's ID
   * @return  \App\Services\BookingRequestService $booking
   */
  public function getBookingData($id) {
    $booking=Booking::select("bookings.*","packages.id as package_id","packages.name as package_name","packages.price as package_price","destinations.id as destination_id","destinations.name as destination_name","users.name as user_name")
    ->join("packages","packages.id","bookings.package_id")
    ->join("destinations","destinations.id","packages.destination_id")
    ->join("users","users.id","bookings.create_user_id")
    ->where('bookings.id','=',$id)
    ->first();
    return $booking;
  }
}
