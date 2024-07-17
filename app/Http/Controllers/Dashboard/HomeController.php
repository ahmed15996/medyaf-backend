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

        //srart carbon data =================================================
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $startWeek = Carbon::now()->startOfWeek();
        $endWeek = Carbon::now()->endOfWeek();

        $startMonth = Carbon::now()->startOfMonth();
        $endMonth = Carbon::now()->endOfMonth();

        $start_year = Carbon::now()->startOfYear();
        $end_year = Carbon::now()->endOfYear();
        //end carbon data ============================================================

        // start modules count =======================================================
        $roles     = Role::count();
        $admins    = Admin::count();
        $users     = User::count();
        $countries = Country::count();
        $events    = Event::count();
        $parties   = Party::count();
        // end modules count ===========================================================


        // start user type  =============================================================
        $apple_users = (round(User::where('type', 'apple')->count() / $users, 2)) * 100;
        $gmail_users = (round(User::where('type', 'gmail')->count() / $users, 2)) * 100;
        $email_users = (round(User::where('type', 'email')->count() / $users, 2)) * 100;
        // end user type =============================================================

        // start users , parties in year (charts) =============================================================
        $users_count = [];
        $parties_count = [];
        $month_list = [];
        $users_counts_list = [];
        $parties_counts_list = [];

        $from = Carbon::now()->startOfYear();
        $to = Carbon::now();

        $months = $from->diffInMonths($to) + 1;

        for ($i = 0; $i < $months; $i++) {
            $startOfMonth = $from->copy()->addMonths($i)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            array_push($month_list, $startOfMonth->format('M'));

            $users_count = User::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            array_push($users_counts_list, $users_count);

            $parties_count = Party::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            array_push($parties_counts_list, $parties_count);
        }

        $users_count = ['month_list' => $month_list, 'counts_list' => $users_counts_list];
        $parties_count = ['month_list' => $month_list, 'counts_list' => $parties_counts_list];


        // end users in year (charts) =============================================================
        $users_year = User::whereBetween('created_at', [$start_year, $end_year])->count();
        $parties_year = Party::whereBetween('created_at', [$start_year, $end_year])->count();

        // start users phone type ( filter circle) =============================================================
        $iPhone_users = User::where('phone_type', 'iPhone')->count();
        $android_users = User::where('phone_type', 'android')->count();
        // start users phone type ( filter circle) =============================================================


        $top_packages = Event::orderByDesc('event_users')->take(7)->get();
        $top_users = User::withCount('events')->orderByDesc('events_count')->take(7)->get();
        $parties_today = Party::whereBetween('date', [$startDate , $endDate ])->take(15)->get();

        return view('dashboard.home' , compact('roles' , 'admins' , 'users' , 'countries' , 'events' , 'parties' , 'parties_today' , 'email_users' , 'apple_users' , 'gmail_users' , 'iPhone_users' , 'android_users' , 'top_packages' , 'top_users' , 'users_count' , 'parties_count' , 'users_year' , 'parties_year'));
    }




}
