<?php
namespace App\Services\Packages;

use App\Dao\Packages\PackageDao;
use App\Dao\Destinations\DestinationDao;

class PackageService
{
  /**
  * @var $packageDao
  * @var $destinationDao
  */
  private $packageDao;
  private $destinationDao;
  /**
   *  Create a package constructor.
   */
  public function __construct(){
    $this->packageDao = new PackageDao();
    $this->destinationDao = new DestinationDao();
  }
  /**
  * Display a listing of the package.
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function getPackageList() {
    return $this->packageDao->getPackageList();
  }
  /**
  * Display a listing of the destination.
  * @return \App\Http\Controllers\Admin\AdminPackageController $destinations
  */
  public function getDestinationList() {
    return $this->packageDao->getDestinationList();
  }
  /**
  * Store a newly package in the storage.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function storePackage($request) {
    return $this->packageDao->storePackage($request);
  }
  /**
  * Display package list.
  * @param  int $id
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function showPackage($id) {
    return $this->packageDao->showPackage($id);
  }
  /**
  * To display destination list in the specified source.
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function getDestination() {
    return $this->destinationDao->getDestination();
  }
  /**
  *Show destination list in the specified source.
  * @param  [type] $id [description]
  * @return \App\Http\Controllers\Admin\AdminDestinationController $destinations
  */
  public function showDestination($id) {
    return $this->destinationDao->showDestination($id);
  }
  /**
  * Update the specified package in storage.
  * @param $request
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function updatePackage($request, $id) {
    return $this->packageDao->updatePackage($request, $id);
  }
  /**
  * Remove the specified resource from storage.
  * @param $id
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function deletePackage($id) {
    return $this->packageDao->deletePackage($id);
  }
  /**
  * Display specified package list.
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminPackageController $packages
  */
  public function searchPackage($request) {
    return $this->packageDao->searchPackage($request);
  }

  //for front-end user
  /**
  * Show package list in user's view.
  * @param $id
  * @return \App\Http\Controllers\User\PackageController $packages
  */
  public function getPackageListById($id) {
    return $this->packageDao->getPackageListById($id);
  }

  //for User show Package and Destination by ID, calling from Dao
  /**
  * To display package list in user's view.
  * @param $id
  * @return \App\Http\Controllers\User\PackageController $packages
  */
  public function getshowpackage($id) {
    return $this->packageDao->getshowpackage($id);
  }
  /**
  * To display destination list in user's view.
  * @param $id
  * @return \App\Http\Controllers\User\PackageController $destinations
  */
  public function getshowdestination($id) {
    return $this->packageDao->getshowdestination($id);
  }
}
