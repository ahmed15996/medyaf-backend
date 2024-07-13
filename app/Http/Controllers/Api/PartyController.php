<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventRequest;
use App\Http\Requests\Api\PartyRequest;
use App\Http\Resources\Api\EventResource;
use App\Http\Resources\Api\PartyDetailsResource;
use App\Http\Resources\Api\PartyResource;
use App\Models\User;
use App\Repositories\Sql\EventRepository;
use App\Repositories\Sql\PartyRepository;
use App\Repositories\Sql\UserRepository;
use App\Services\Api\PartyService;

class PartyController extends Controller
{
    use ApiResponseTrait ;
    protected $eventRepo , $userRepo  , $partyService , $partyRepo;

    public function __construct(EventRepository $eventRepo , UserRepository $userRepo  , PartyService $partyService , PartyRepository $partyRepo)
    {
       $this->eventRepo    = $eventRepo ;
       $this->userRepo     = $userRepo ;
       $this->partyRepo    = $partyRepo ;
       $this->partyService = $partyService ;
    }

    public function get_all_packages(){
        $events = $this->eventRepo->getAll();
        return $this->ApiResponse(EventResource::collection($events) , '' , 200);
    }

    public function add_balance(EventRequest $request){
       $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
       return $this->partyService->add_balance($request , $user);
    }

    public function get_user_balance(){
        $user = auth()->user();
        return $this->partyService->get_user_balance($user);
    }



    public function add_invitation(PartyRequest $request){
      $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
      return $this->partyService->add_party($request , $user);
    }

    public function invitation_details($id){
      $party = $this->partyRepo->getWhere( [ ['id' , $id] , ['user_id' , auth()->user()->id]] )->first();
      return $party ? $this->ApiResponse(new PartyDetailsResource($party) , '' , 200) : $this->notFoundResponse() ;
    }

    public function update_invitation(PartyRequest $request , $id){
        $party = $this->partyRepo->getWhere( [ ['id' , $id] , ['user_id' , auth()->user()->id]] )->first();
        return $party ? $this->partyService->update_party($request , $party) : $this->notFoundResponse();

    }

    public function delete_invitation($id){
       $party = $this->partyRepo->getWhere([ ['id' , $id] , ['user_id' , auth()->user()->id]])->first();
       return $party ? $this->partyService->delete_party($party) :  $this->notFoundResponse();

    }



    public function user_invitations(){
        $user = User::with(['parties'])->where('id' , auth()->user()->id)->first();

        return
            $user['parties']->count() > 0 ?
            $this->ApiResponse(PartyResource::collection($user['parties']) , '' , 200) :
            $this->ApiResponse([] , '' , 200) ;
        ;
    }

}











