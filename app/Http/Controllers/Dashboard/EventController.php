<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Repositories\Sql\EventRepository;
use App\Services\Admin\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class EventController extends Controller
{
    protected $eventRepo , $eventService;
    public function __construct(EventRepository $eventRepo , EventService $eventService)
    {
        $this->middleware('permission:events-read')->only(['index']);
        $this->middleware('permission:events-create')->only(['create', 'store']);
        $this->middleware('permission:events-update')->only(['edit', 'update']);
        $this->middleware('permission:events-delete')->only(['destroy']);
        $this->eventRepo    = $eventRepo ;
        $this->eventService = $eventService ;

    }


    public function get_events()
    {
        return $this->eventService->get_events();
    }

    public function index()
    {
        return view('dashboard.backend.events.index');
    }


    public function create()
    {
         return view('dashboard.backend.events.create');
    }


    public function store(EventRequest $request)
    {

       $data = $request->all();
       $this->eventService->add_event($request , $data);
       return redirect(route('admin.events.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        $event = $this->eventRepo->findOne($id);
        return view('dashboard.backend.events.show' , compact('event'));
    }


    public function edit($id)
    {
        $event = $this->eventRepo->findOne($id);
        return view('dashboard.backend.events.edit' , compact('event'));

    }


    public function update(EventRequest $request, $id)
    {
        $event = $this->eventRepo->findOne($id);
        $data = $request->all();
       $this->eventService->update_event($request , $data , $event);
       return redirect(route('admin.events.index'))->with('success', __('models.updated_successfully'));
    }


    public function destroy($id)
    {
         $event = $this->eventRepo->findOne($id);

        if ($event->img) {
            Storage::delete($event->img);
        }

        $event->delete();
        return redirect(route('admin.events.index'))->with('success', __('models.deleted_successfully'));

    }

    

}
