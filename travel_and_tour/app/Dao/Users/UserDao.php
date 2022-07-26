<?php
namespace App\Dao\Users;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserDao {
  /**
  * List of Users
  * @return \App\Services\Users\UserService $user
  */
  public function getUserList() {
    $user = User::where('status',1)->paginate(10);
    return $user;
  }

  /**
  * Create a new User
  * @param  array $user User data
  * @return \App\Services\Users\UserService $user
  */
  public function storeUser($user) {
    $user->save();
    return $user;
  }

  /**
  * Register a new user
  * @param array $user User data
  * @return \App\Services\Users\UserService $user
  */
  public function registerUser($user) {
    $user->save();
    return $user;
  }

  /**
  * Admin User Information
  * @param  int $id User ID
  * @return \App\Services\Users\UserService $user
  */
  public function showUser($id) {
    $user = User::find($id);
    return $user;
  }

  /**
  * Update User Information
  * @param  array $user User Information
  * @return \App\Services\Users\UserService $user
  */
  public function updateUser($user) {
    $user->save();
    return $user;
  }

  /**
  * Delete a user
  * @param  int $id User ID
  * @return \App\Services\Users\UserService $user
  */
  public function deleteUser($id) {
    $user = User::find($id);
    $user->delete();
    return $user;
  }

  /**
  * Search User
  * @param  \Illuminate\Http\Request $request User Data
  * @return \App\Services\Users\UserService $user
  */
  public function searchUser($request) {
    $user = User::select('users.*')->where('status',1);
    if($request->name != null or $request->email != null){
      if($request->name != null) {
        $user = $user->where('name','LIKE',"%$request->name%");
      }
      if($request->email != null){
        $user = $user->where('email','LIKE',"%$request->email%");
      }
    }
    $user = $user->paginate(10);
    $user = $user->appends(['email' => $request->email,'name' => $request->name]);
    return $user;
  }

  /**For Frontend
  * Get user profile
  * @return \App\Services\Users\UserService $user
  */
  public function getProfile() {
    $user = User::find(Auth::user()->id);
    return $user;
  }

  /**
  * Update User profile
  * @param  array $user Updated user Information
  * @return \App\Services\Users\UserService $user
  */
  public function profileUpdate($user) {
    $user->save();
    return $user;
  }
}
