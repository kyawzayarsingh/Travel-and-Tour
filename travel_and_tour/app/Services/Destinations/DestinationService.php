<?php
namespace App\Services\Destinations;

use App\Dao\Destinations\DestinationDao;
use App\Booking;
use App\Destination;
use App\Package;
use Auth;

class  DestinationService
{
  /**
  * @var $destinationDao
  */
  private $destinationDao;
  /**
   *  Create a destination constructor.
   */
  public function __construct() {
    $this->destinationDao = new DestinationDao();
  }
  /**
  * To display a listing of the destination.
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function getDestinationList() {
    return $this->destinationDao->getDestinationList();
  }
  /**
   * To display a listing of the destination.
   * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
   */
  public function getAllDestinationList() {
    return $this->destinationDao->getAllDestinationList();
  }
  /**
  * Store a newly created destination in storage.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function storeDestination($request) {
    $images = array();
    if($request->hasfile('images'))
    {
      foreach($request->file('images') as $image)
      {
        $name = $image->getClientOriginalName();
        $images[] = $name;
      }
    }
    $destination = new Destination;
    $destination->name = request()->name;
    $destination->image = json_encode($images);
    $destination->city = request()->city;
    $destination->division = request()->division;
    $destination->description = request()->description;
    $destination->create_user_id = Auth::id();
    return $this->destinationDao->storeDestination($destination);
  }
  /**
  * Display the specified destination.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function showDestination($id) {
    return $this->destinationDao->showDestination($id);
  }
  /**
  * Update the specified destination in storage.
  * @param $request
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function updateDestination($request, $id) {
    $destination = Destination::find($id);

    if($request->oldimg != null) {
      $oldimg_data = $request->oldimg[0] ? explode(",",  $request->oldimg[0]) : array();
    }
    $images = $request->images;
    $images_data = array();
    if($request->images != null)  {
      foreach($request->file('images') as $image)  {
        $name = $image->getClientOriginalName();
        $path = $image->storeAs('/images/destination/'.$destination->id, $name);
        $images_data[] = $name;
      }
    }
    $destination->name= request()->name;
    $null_array = array();
    $array = array_unique(array_merge ($oldimg_data, $images_data));
    if(count($array) !=0 ) {
      $destination->image=$array;
    } else {
      $destination->image=$null_array;
    }
    $destination->city=request()->city;
    $destination->division=request()->division;
    $destination->description=request()->description;
    return $this->destinationDao->updateDestination($destination);
  }
  /**
  * Remove the specified destination from storage.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function deleteDestination($id) {
    return $this->destinationDao->deleteDestination($id);
  }
  /**
  * Display destination list.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function searchDestination($request) {
    return $this->destinationDao->searchDestination($request);
  }
  /**
  * Display destination detail list in user's view.
  * @param $id
  * @return \App\Http\Controllers\User\AdminDestinationController $destinations
  */
  public function showDestdetail($id) {
    return $this->destinationDao->showDestdetail($id);
  }
  // front
  /**
  * Show destination list in user's view.
  * @return \App\Http\Controllers\User\AdminDestinationController $destinations
  */
  public function showDestinationData() {
    return $this->destinationDao->showDestinationData();
  }

}
