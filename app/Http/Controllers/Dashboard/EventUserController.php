<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Repositories\Sql\EventUserRepository;
use App\Repositories\Sql\UserRepository;
use App\Services\Admin\EventUserService;



class EventUserController extends Controller
{
    protected $event_user_Repo , $eventService  , $userRepo;
    public function __construct(EventUserRepository $event_user_Repo , EventUserService $eventService  , UserRepository $userRepo)
    {
        $this->middleware('permission:events-read')->only(['index']);
        $this->middleware('permission:events-create')->only(['create', 'store']);
        $this->middleware('permission:events-update')->only(['edit', 'update']);
        $this->middleware('permission:events-delete')->only(['destroy']);
        $this->event_user_Repo = $event_user_Repo ;
        $this->eventService    = $eventService ;
        $this->userRepo        = $userRepo ;

    }


    public function get_event_users()
    {
        return $this->eventService->get_events();
    }

    public function index()
    {

        $users = $this->userRepo->getAll();
        $events = Event::orderByDesc('id')->get();
        return view('dashboard.backend.event-users.index' , compact('users' , 'events'));
    }




}
