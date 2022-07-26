<?php
namespace App\Dao\Packages;
use App\Package;
use App\Destination;
use DB;
use Auth;

class PackageDao
{
  /**
  * List of package information
  * @return  \App\Services\Packages\PackageService  $package
  */
  public function getPackageList(){
    $package = DB::table('packages')
    ->select('destinations.id as destination_id','packages.*','destinations.name as destination_name')
    ->join('destinations','destinations.id','=','packages.destination_id')
    ->paginate(10,['*'],'p')
    ->withQueryString('p');
    return $package;
  }

  /**
  * Get List of destination
  * @return \App\Services\Destinations\DestinationService  $destination
  */
  public function getDestinationList(){
    $destination = Destination::get();
    return $destination;
  }

  /**
  * Create a new package
  * @param  \Illuminate\Http\Request $request  Package Data
  * @return \App\Services\Destinations\DestinationService  $destination
  */
  public function storePackage($request) {
    $package = new Package;
    $package->name = request()->name;
    $package->destination_id = request()->destination;
    $package->price = request()->price;
    $package->description = request()->description;
    $package->create_user_id = Auth::id();
    $package->save();
    return $package;
  }

  /**
  * Package list with related Id
  * @param  int $id Package ID
  * @return \App\Services\Packages\PackageService $package
  */
  public function showPackage($id) {
    $package = Package::find($id);
    return $package;
  }

  /**
  * Update Package Information
  * @param  \Illuminate\Http\Request $request  Package Data
  * @param  int $id   PackageID to update information
  * @return \App\Services\Packages\PackageService $package
  */
  public function updatePackage($request,$id) {
    $package = Package::find($id);
    $package->name = request()->name;
    $package->destination_id = request()->destination;
    $package->price = request()->price;
    $package->description = request()->description;
    $package->save();
    return $package;
  }

  /**
  * Delete a package
  * @param  int $id  PackageID that will be deleted
  * @return \App\Services\Packages\PackageService $package
  */
  public function deletePackage($id) {
    $package = Package::find($id);
    $package->delete();
    return $package;
  }

  /**
  * Search package
  * @param  \Illuminate\Http\Request $request  Package Data
  * @return \App\Services\Packages\PackageService $package
  */
  public function searchPackage($request) {
    $package = Package::select('packages.*','destinations.name as destination_name')
    ->join('destinations','destinations.id','=','packages.destination_id');
    if($request->destination_id != 0 or $request->name !=null){
      if($request->destination_id != 0) {
        $package = $package->where('packages.destination_id', '=' , $request->destination_id);
      }
      if($request->name != null) {
        $package = $package->where('packages.name', 'LIKE' ,"%$request->name%");
      }
    }
    $package = $package->paginate(10,['*'],'p');
    $package = $package->appends(['name' => $request->name,'destination_id' => $request->destination_id])
    ->withQueryString('p');
    return $package;
  }

  /**
  * Package List for Admin Most demanded package report
  * @param  date $year Year of Booking date
  * @return \App\Services\Packages\PackageService $package
  */
  public function reportPackageList($year){
    $package = DB::table('packages')
    ->select('packages.id','packages.*','destinations.name as destination_name','bookings.id as booking_id',DB::raw('COUNT(bookings.id) as total_bookings'))
    ->join('destinations','destinations.id','=','packages.destination_id')
    ->join('bookings','bookings.package_id','=','packages.id')
    ->whereYear('bookings.booking_date', now())
    ->where('status',3)
    ->groupBy('packages.name')
    ->orderBy('total_bookings','DESC')
    ->get();
    return $package;
  }
  /**
  * Search for Report Package
  * @param  date $year Year of booking date
  * @return \App\Services\Packages\PackageService $package
  */
  public function searchReportPackage($year) {
    $package = DB::table('packages')
    ->select('packages.id','packages.name','destinations.name as destination_name',DB::raw('COUNT(bookings.id) as total_bookings'));
    if($year != null){
      $package = $package->whereYear('bookings.booking_date', $year);
    }else{
      $package = $package->whereYear('bookings.booking_date',now());
    }
    $package = $package->join('destinations','destinations.id','=','packages.destination_id')
    ->join('bookings','bookings.package_id','=','packages.id')
    ->where('status',3)
    ->groupBy('packages.name')
    ->orderBy('total_bookings','DESC');
    $package = $package->get();
    return $package;
  }

  /**for front-end user
  * Package List for each destination
  * @param  int $id destination_id
  * @return \App\Services\Packages\PackageService $package
  */
  public function getPackageListById($id){
    $package = DB::table('packages')
    ->select('destinations.id as destination_id','packages.*','destinations.name as destination_name',
    'destinations.city as destination_city','destinations.division as destination_division')
    ->join('destinations','destinations.id','=','packages.destination_id')
    ->where('packages.destination_id','=',$id);
    $package = $package->get();
    return $package;
  }

  //for User show Package and Destination by ID
  public function getshowpackage($id){
    $package = Package::select('packages.id','packages.name','packages.description','packages.price')->where('id',$id)->get();
    //  var_dump($package);die;
    return $package;
  }
  public function getshowdestination($id){
    $destinations = Destination::select('destinations.*')->where('id',$id)->get();
    return $destinations;
  }
}
