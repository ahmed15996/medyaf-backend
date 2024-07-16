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

        $start_year = Carbon::now()->startOfYear();
        $end_year = Carbon::now()->endOfYear();


        $roles     = Role::count();
        $admins    = Admin::count();
        $users     = User::count();
        $countries = Country::count();
        $events    = Event::count();
        $parties   = Party::count();


        $apple_users = (round(User::where('type', 'apple')->count() / $users, 2)) * 100;
        $gmail_users = (round(User::where('type', 'gmail')->count() / $users, 2)) * 100;
        $email_users = (round(User::where('type', 'email')->count() / $users, 2)) * 100;





        $iPhone_users = User::where('phone_type', 'iPhone')->count();
        $android_users = User::where('phone_type', 'android')->count();


        $top_packages = Event::orderByDesc('event_users')->take(7)->get();
        $top_users = User::withCount('events')->orderByDesc('events_count')->take(7)->get();

        $parties_today = Party::whereBetween('date', [$startDate , $endDate ])->take(15)->get();

        return view('dashboard.home' , compact('roles' , 'admins' , 'users' , 'countries' , 'events' , 'parties' , 'parties_today' , 'email_users' , 'apple_users' , 'gmail_users' , 'iPhone_users' , 'android_users' , 'top_packages' , 'top_users'));
    }




}
