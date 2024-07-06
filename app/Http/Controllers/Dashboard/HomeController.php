<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\StaticPage;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()  {


        return view('dashboard.home');
    }




}
