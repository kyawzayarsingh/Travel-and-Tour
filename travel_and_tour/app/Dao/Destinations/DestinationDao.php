<?php
namespace App\Dao\Destinations;

use App\Dao\Destinations\DestinationDao;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Booking;
use App\Destination;
use App\Package;
use Auth;
use DB;

class DestinationDao {
  /**
  * List of Destination
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function getDestinationList() {
    $destination = DB::table('destinations')
    ->select('destinations.*')
    ->paginate(10);
    return $destination;
  }
  /**
  * List of Destiantion
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function getAllDestinationList() {
    $destination = DB::table('destinations')
    ->select('destinations.*')
    ->get();
    return $destination;
  }

  /**
  * Create a destination
  * @param  array $destination Destination Information
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function storeDestination($destination) {
    $destination->save();
    return $destination;
  }

  /**
  * Show Destination List
  * @param  int $id Destination ID
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function showDestination($id) {
    $destination = Destination::find($id);
    return $destination;
  }

  /**
  * Security
  * @param  array $data Destination Information
  * @return \App\Services\Destinations\DestinationService $destination
  */
  function secure($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return($data);
  }

  /**
  * Update Destination Information
  * @param  array $destination Destination Information
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function updateDestination($destination) {
    $destination->save();
    return $destination;
  }

  /**
  * Delete a destination
  * @param  int $id Destination ID to delete
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function deleteDestination($id) {
    $destination = Destination::find($id);
    $destination->delete();
    return $destination;
  }
  /**
  * Search Destination (Frontend)
  * @param  \Illuminate\Http\Request $request Destination Data
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function searchDestination($request) {
    $destination = Destination::select('destinations.*');
    if($request->name !=null or $request->city !=null or $request->division !=null) {
      if($request->name != null ) {
        $destination = $destination->where('name','LIKE',"%$request->name%");
      }

      if($request->city != null) {
        $destination = $destination->where('city','LIKE',"%$request->city%");
      }

      if($request->division != null) {
        $destination = $destination->where('division','LIKE',"%$request->division%");
      }
    }
    $destination = $destination->paginate(10);
    $destination=$destination->appends(['name'=> $request->name,'city'=>$request->city,'division'=> $request->division]);
    return $destination;
  }

  /**Report Admin
  * Destination List for report
  * @param  date $year Year of Booking Date
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function getDestinationData($year) {
    $destination = Destination::selectRaw('destinations.id,destinations.name,destinations.city,destinations.division, sum(bookings.guest_no)as guest_no')
    ->join("packages","packages.destination_id","destinations.id")
    ->join("bookings","bookings.package_id","packages.id")
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',now())
    ->groupBy('destinations.name')
    ->orderBy('guest_no', 'DESC')
    ->paginate(10);
    return $destination;
  }

  /**
  * Search Destination (Admin Report)
  * @param  date $year Year of Booking Date
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function searchDestinationData($year) {
    $destination = Destination::selectRaw('destinations.id,destinations.name,destinations.city,destinations.division, sum(bookings.guest_no)as guest_no')
    ->join("packages","packages.destination_id","destinations.id")
    ->join("bookings","bookings.package_id","packages.id")
    ->where('bookings.status',3)
    ->whereYear('bookings.booking_date','=',$year)
    ->groupBy('destinations.name')
    ->orderBy('guest_no', 'DESC')
    ->paginate(10);
    return $destination;
  }

  /**Frontend
  * List of Destination
  * @param  int $id Destination ID
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function showDestdetail($id){
    $destination = Destination::find($id);
    return $destination;
  }

  /**
  * List of Destination (Report)
  * @return \App\Services\Destinations\DestinationService $destination
  */
  public function showDestinationData() {
    $destination = Destination::selectRaw('destinations.*,sum(bookings.guest_no)as guest_no')
    ->join("packages","packages.destination_id","destinations.id")
    ->join("bookings","bookings.package_id","packages.id")
    ->where('bookings.status',3)
    ->groupBy('destinations.name')
    ->orderBy('guest_no', 'DESC')
    ->get();
    return $destination;
  }
}
