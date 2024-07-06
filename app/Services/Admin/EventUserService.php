<?php

namespace App\Services\Admin;

use App\Models\EventUser;
use App\Repositories\Sql\EventUserRepository;

class EventUserService
{
    protected $eventRepo ;

    public function __construct(EventUserRepository $eventRepo)
    {
        $this->eventRepo    = $eventRepo ;
    }

    public function get_events(){

        $events = $this->eventRepo->query()->with(['user' , 'event']);
        return $this->columns($events);
    }

    public function columns($events){
        return DataTables($events)
        
        ->filterColumn('user', function($query , $keyword) {
            $query->whereRelation('user' , 'id' , $keyword);
        })
        ->filterColumn('event', function($query , $keyword) {
            $query->whereRelation('event' , 'id' , $keyword);
        })
        ->editColumn('price' , function($event){
            return $event->event->price;
        })

        ->editColumn('count' , function($event){
            return $event->event->count;
        })

        ->editColumn('user' , function($event){
            return $event->user->name;
        })


        ->editColumn('created_at' , function($event){
            return $event->created_at->format('y-m-d');
        })

        ->make(true);
    }




}
