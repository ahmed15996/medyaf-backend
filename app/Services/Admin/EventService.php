<?php

namespace App\Services\Admin;

use App\Models\Event;
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

    public function get_events($request){

        $events = Event::query()->with(['users']);
        orderById($request , $events , 'order_by' , 'id');
        if ($request->has('order_price') && $request->order_price != '') {
            $events->orderBy('price', $request->order_price);
        }
        if ($request->has('order_count') && $request->order_count != '') {
            $events->orderBy('count', $request->order_count);
        }

        if ($request->has('order_event') && $request->order_event != '') {
            $events->orderBy('event_users', $request->order_event);
        }

        return $this->columns($events);
    }

    public function columns($events){
        return DataTables($events)

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
