<?php

namespace App\Services\Admin;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Models\User;
use App\Repositories\Sql\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserService
{
    use HelperTrait;
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo    = $userRepo ;
    }

    public function get_users($request){

        $users = User::query();
        orderById($request , $users);
        return $this->columns($users);
    }

    public function columns($users){
        return DataTables($users)
        ->filterColumn('country', function($query , $keyword) {
            $query->whereRelation('country' , 'id' , $keyword);
        })
        ->editColumn('country' , function($user){
            return $user->country ? $user->country->name : '-';
        })

        ->editColumn('uid' , function($user){
            return $user->uid ? $user->uid : '-';
        })
        ->addColumn('action', 'dashboard.backend.users.actions')

        ->rawColumns(['action'])
        ->make(true);
    }

    public function cahnge_active($user , $request){
        if($request->is_active == 1){
            $is_active = 1 ;
         }else{
             $is_active = 0 ;
         }
         $user->update([
             'is_active'    => $is_active
         ]);

         return response()->json(['success' => __('models.status_update')]);
    }

    public function get_events($events){
        return DataTables($events)


        ->editColumn('price' , function($event){
            return $event->event->price;
        })

        ->editColumn('count' , function($event){
            return $event->event->count;
        })


        ->editColumn('created_at' , function($event){
            return date('D, d M Y - h:ia', strtotime($event->created_at));
        })
        ->make(true);
    }

    public function get_parties($parties){
        return DataTables($parties)
        ->editColumn('time' , function($party){
            return Carbon::parse($party->time)->format('h:i A');
        })
        ->addColumn('action', 'dashboard.backend.parties.actions')
        ->rawColumns(['action'])
        ->make(true);
    }

    public function send_notify($request , $user){

         if($user){
             $userToken = [];
             $userToken[] = $user->device_key;
             sendFCMNotification($request->title , $request->desc , $userToken , 'admin' , 'user');
         }
     }


}
