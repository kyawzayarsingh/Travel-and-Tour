<?php
namespace App\Dao\UserRequests;
use App\User;

class UserRequestDao {
  /**
  * Approvement of users
  * @param  int $id     User ID
  * @param  int $status  To give status for accept or reject
  * @return \App\Services\UserRequests\UserRequestService $user
  */
  public function userApprove($id,$status) {
    $user = User::find($id);
    $user->status = $status;
    $user->save();
    return $user;
  }

  /**
  * List of User Requests
  * @return \App\Services\UserRequests\UserRequestService $user
  */
  public function getUserRequestList() {
    $user = User::where('status',0)->where('type',1)->get();
    return $user;
  }

  /**
  * Search User Requests
  * @param  \Illuminate\Http\Request $request  User Data
  * @return \App\Services\UserRequests\UserRequestService $user
  */
  public function searchUser($request) {
    $user = User::select('users.*')->where('status',0);
    if($request->name != null) {
      $user = $user->where('name','LIKE',"%$request->name%");
    }
    if($request->email != null) {
      $user = $user->where('email','LIKE',"%$request->email%");
    }
    $user = $user->get();
    return $user;
  }
}
