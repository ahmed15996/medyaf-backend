<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Party;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()  {
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $startWeek = Carbon::now()->startOfWeek();
        $endWeek = Carbon::now()->endOfWeek();

        $startMonth = Carbon::now()->startOfMonth();
        $endMonth = Carbon::now()->endOfMonth();


        $roles     = Role::count();
        $admins    = Admin::count();
        $users     = User::count();
        $countries = Country::count();
        $events    = Event::count();
        $parties   = Party::count();
        $event_users = EventUser::count();
        $parties_today = Party::whereBetween('date', [$startDate , $endDate ])->get()->take(10);

        return view('dashboard.home' , compact('roles' , 'admins' , 'users' , 'countries' , 'events' , 'parties' , 'parties_today'));
    }




}
