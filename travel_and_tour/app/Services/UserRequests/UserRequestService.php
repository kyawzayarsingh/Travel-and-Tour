<?php

namespace App\Services\UserRequests;

use App\Dao\UserRequests\UserRequestDao;

class UserRequestService {
  /**
  * @var $userRequestDao
  */
  private $userRequestDao;
  /**
   *  Create a user request constructor.
   */
  public function __construct() {
    $this->userRequestDao = new UserRequestDao();
  }
  /**
  * Admin approve user's request.
  * @param  [int] $id
  * @param  [int] $status
  * @return \App\Http\Controllers\Admin\AdminUserRequestController
  */
  public function userApprove($id, $status) {
    return $this->userRequestDao->userApprove($id, $status);
  }
  /**
  * Show a list of user request.
  * @return \App\Http\Controllers\Admin\AdminUserRequestController
  */
  public function getUserRequestList() {
    return $this->userRequestDao->getUserRequestList();
  }
  /**
  * Display specified user by searching
  * @param $request
  * @return \App\Http\Controllers\Admin\AdminUserRequestController
  */
  public function searchUser($request) {
    return $this->userRequestDao->searchUser($request);
  }
}
