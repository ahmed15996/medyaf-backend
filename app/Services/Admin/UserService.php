<?php

namespace App\Services\Admin;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    use HelperTrait;
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo    = $userRepo ;
    }

    public function get_users(){

        $users = $this->userRepo->query();

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


}
