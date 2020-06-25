<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createRole(Request $request)
    {
        $this->validate($request, [
            'role_name' => 'required'
        ]);
        $roleCreate = Role::create([
            'role_name' => $request->role_name
        ]);

        Alert::success($roleCreate->role_name, 'Has Been Created By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->roles'));
    }

    public function deleteRole($id)
    {
        $roleDelete = Role::find($id);
        $roleDelete->delete();

        Alert::error($roleDelete->role_name, 'Has Been Deleted By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->roles'));
    }
}
