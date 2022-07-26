<?php

namespace App\Services\Reports;

use App\Dao\Bookings\BookingDao;
use App\Dao\Destinations\DestinationDao;
use App\Dao\Packages\PackageDao;

class ReportService {
  /**
  * @var $bookingDao
  * @var $destinationDao
  * @var $packageDao
  */
  private $bookingDao;
  private $destinationDao;
  private $packageDao;
  /**
   *  Create a report constructor.
   */
  public function __construct() {
    $this->bookingDao = new BookingDao();
    $this->destinationDao = new DestinationDao();
    $this->packageDao = new PackageDao();
  }
  /**
  * Show most popular destination.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function getDestinationData($year) {
    return $this->destinationDao->getDestinationData($year);
  }
  /**
  * Display most popular destination the specified year.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function searchDestinationData($year) {
    return $this->destinationDao->searchDestinationData($year);
  }
  /**
  * Display most toured month in a year.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function getMonthTourData($year) {
    return $this->bookingDao->getMonthTourData($year);
  }
  /**
  * Display monthly tour data in a year.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function searchMonthTourData($year) {
    return $this->bookingDao->searchMonthTourData($year);
  }
  /**
  * Display most booking customer list.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function getBookingCustomerList($year) {
    return $this->bookingDao->getBookingCustomerList($year);
  }
  /**
  * Display most booking customer list in a specified year.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function bookingSearch($year) {
    return $this->bookingDao->bookingSearch($year);
  }
  /**
  * Display most demand package list in a specified year.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function reportPackageList($year) {
    return $this->packageDao->reportPackageList($year);
  }
  /**
  * Display searching package list in a specified list.
  * @param $year
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function searchReportPackage($year) {
    return $this->packageDao->searchReportPackage($year);
  }
  /**
  * Display monthly tour data in a year.
  * @param $year
  * @param $month_arr
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function getYearTourData($year, $month_arr) {
    $month_no= $month_arr;
    $yearly_finance   = array();

    foreach ($month_no as $key=>$val) {

      $touryear = $this->bookingDao->getYearTourData($year, $key);

      if($touryear == null){
        $yearly_finance[]= (object) [
          $val,
          0,
          0
        ];
      }
      else{
        $yearly_finance[] = $touryear;
      }
    }

    return $yearly_finance;
  }
  /**
  * Display monthly tour data in a specified year.
  * @param $year
  * @param $month_arr
  * @return \App\Http\Controllers\Admin\AdminReportController
  */
  public function searchYearTourData($year, $month_arr) {
    $month_no = $month_arr;
    $yearly_finance = array();

    foreach ($month_no as $key=>$val) {
      $touryear = $this->bookingDao->searchYearTourData($year, $key);

      if($touryear == null) {
        $yearly_finance[] = (object) [
          $val,
          0,
          0
        ];
      }
      else {
        $yearly_finance[] = $touryear;
      }
    }

    return $yearly_finance;
  }
}
