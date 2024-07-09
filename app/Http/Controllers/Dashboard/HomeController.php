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



        $event_users_today = EventUser::whereBetween('created_at', [$startDate, $endDate])->get();

        $count_today = 0 ;
        $price_today = 0 ;
        if($event_users_today->count() > 0 ){
            foreach ($event_users_today as $event_today) {
                $count_today += $event_today->event->count;
                $price_today += $event_today->event->price;
            }
        }

        $event_users_week = EventUser::whereBetween('created_at', [$startWeek, $endWeek])->get();

        $count_week = 0 ;
        $price_week = 0 ;
        if($event_users_week->count() > 0 ){
            foreach ($event_users_week as $event_week) {
                $count_week += $event_week->event->count;
                $price_week += $event_week->event->price;
            }
        }

        $event_users_month = EventUser::whereBetween('created_at', [$startMonth, $endMonth])->get();
        $count_month = 0 ;
        $price_month = 0 ;
        if($event_users_month->count() > 0 ){
            foreach ($event_users_month as $event_month) {
                $count_month += $event_month->event->count;
                $price_month += $event_month->event->price;
            }
        }

        $parties_today = Party::whereBetween('date', [$startDate , $endDate ])->get();

        return view('dashboard.home' , compact('roles' , 'admins' , 'users' , 'countries' , 'events' , 'parties' , 'count_today' , 'count_week' , 'count_month' , 'price_today' , 'price_week' , 'price_month' , 'parties_today'));
    }




}
