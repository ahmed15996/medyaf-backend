<?php

namespace App\Services\Admin;

use App\Repositories\Sql\EventRepository;
use App\Repositories\Sql\EventUserRepository;
use Illuminate\Http\Request;

class EventService
{
    protected $eventRepo , $eventUserRepo;

    public function __construct(EventRepository $eventRepo , EventUserRepository $eventUserRepo)
    {
        $this->eventRepo    = $eventRepo ;
        $this->eventUserRepo= $eventUserRepo ;
    }

    public function get_events(){

        $events = $this->eventRepo->query()->with(['users']);
        return $this->columns($events);
    }

    public function columns($events){
        return DataTables($events)

        ->editColumn('users', function($event) {
            return  $event->users()->count() ;
        })
        ->editColumn('created_at' , function($event){
            return $event->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.events.actions')
        ->rawColumns(['action' , 'users'])
        ->make(true);
    }

    public function add_event(Request $request , $data){
        $event =$this->eventRepo->create($data);
    }

    public function update_event(Request $request , $data , $event){
        $event->update($data);
    }



 


}
