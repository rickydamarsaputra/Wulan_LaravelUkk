<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classroom;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function infoPage()
  {
    $users = User::get();
    return view('skarisa._dashboard', compact('users'));
  }
}
