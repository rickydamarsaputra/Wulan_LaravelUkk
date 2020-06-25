<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Role;

class AuthController extends Controller
{
  public function loginUser(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

    if (auth()->attempt($request->only(['username', 'password']))) {
      if (auth()->attempt($request->only(['username', 'password', 'role_id']))) {
        $userLogin = User::whereUsername($request->username)->first();
        if ($userLogin->is_active == 1) {
          Alert::success($userLogin->name, 'Welcome To Skarisa App!');
          return redirect(route('skarisa->dashboard'));
        } else {
          Alert::error($userLogin->name, 'Sorry Your Account Is Not Active!');
          return redirect()->back();
        }
      } else {
        $userLogin = User::whereUsername($request->username)->first();
        $roleUser = Role::find($request->role_id);
        Alert::error($userLogin->name, 'I Think Your Role Is Not ' . $roleUser->role_name . '!');
        return redirect()->back();
      }
    } else {
      Alert::error($request->username, 'You Enter The Username Or Password Is Wrong!');
      return redirect()->back();
    }
  }

  public function createUser(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'username' => 'required',
      'password' => 'required|min:5',
      'retype_password' => 'required|same:password|min:5'
    ]);

    $user = User::create([
      'name' => $request->name,
      'username' => $request->username,
      'password' => bcrypt($request->password),
      'role_id' => $request->role_id,
      'is_active' => 1
    ]);

    $userRole = Role::find($request->role_id);

    Alert::success($user->name, 'Has Been Registered' . ' For Role ' . $userRole->role_name . '!');
    return redirect(route('skarisa->dashboard'));
  }

  public function logout()
  {
    Alert::success(auth()->user()->name, 'Good By!');
    Auth::logout();
    return redirect(route('auth->login'));
  }

  public function changeStatus($id)
  {
    $userChangeStatus = User::findOrFail($id);
    if ($userChangeStatus->is_active == 1) {
      $userChangeStatus->update([
        'is_active' => 0
      ]);
      Alert::info($userChangeStatus->name, 'Has Been Locked!');
    } else {
      $userChangeStatus->update([
        'is_active' => 1
      ]);
      Alert::info($userChangeStatus->name, 'Has Been Unlocked!');
    }

    return redirect()->back();
  }

  public function changeUser(Request $request, $id)
  {
    $userChange = User::findOrFail($id);
    $userChange->update([
      'name' => $request->name,
      'username' => $request->username,
      'role_id' => $request->role_id
    ]);

    Alert::success($userChange->name, 'You Are Success Change!');
    return redirect(route('skarisa->dashboard'));
  }

  public function firedUser($id)
  {
    $firedUser = User::findOrFail($id);

    Alert::error($firedUser->name, 'You Are Fired By ' . auth()->user()->name);
    $firedUser->delete();
    return redirect()->back();
  }
}
