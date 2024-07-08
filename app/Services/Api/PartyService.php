<?php

namespace App\Services\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Repositories\Sql\PartyRepository;
use Illuminate\Http\Request;

class PartyService
{
    use ApiResponseTrait ;

    protected $partyRepo ;

    public function __construct(PartyRepository $partyRepo)
    {
       $this->partyRepo = $partyRepo ;
    }

     // puy invitations
    public function add_events(Request $request , $user){
        // puy invitations
        $event = $user->events()->create([
            'event_id' => $request->event_id
        ]);

        // user has two free invitations in addition to the invitations he purchased
        $user->update([
        'event' => $user->event + $event->event->count
        ]);

        return $this->ApiResponse(true , 'data add successfully' , 200);
    }


    public function add_party(Request $request, $user){


        // check count invitations //
        $invitationCheck = $this->check_count_invitations($request, $user);
        if ($invitationCheck !== true) {
            return $invitationCheck;
        }

        // add party data //
        $data = $request->except('img', 'user_id', 'users');
        $data['user_id'] = $user->id;

        // add image by helper
        addImage($request, $data, 'img', 'parties');
        $party = $this->partyRepo->create($data);
        //check found users and add phone , count
        $this->add_phones($party , $request);
        return $this->ApiResponse(true, 'data add successfully', 200);
    }

    public function update_party($request, $party)
    {
        $owner_party = $party->user;  // Party owner
        $this->delete_old_users($party);

        // Check if there are enough invitations
        $invitationCheck = $this->check_count_invitations($request, $owner_party);
        if ($invitationCheck !== true) {
            return $invitationCheck;
        }

        // Update party data
        $data = $request->except('img', 'user_id', 'users');
        $data['user_id'] = $owner_party->id;
        updateImg($request, $data, 'img', 'parties', $party);
        $party->update($data);

        ////check found users and add phone , count And Add new invitetaions
        $this->add_phones($party, $request);

        return $this->ApiResponse(true, 'data updated successfully', 200);
    }

    // Verify whether the number of invitations is sufficient or not
    public function check_count_invitations($request, $user){
        $users = json_decode($request->users);

        if(!empty($users)){
            $count_users = count($users);
            if($count_users > $user->event){
                return $this->ApiResponse(false, 'لا يوجد عدد دعوات كافي', 200);
            }
        }
        return true;
    }

    // If the number of invitations is sufficient, the invitees are added to the party
    public function add_phones($party , $request){

        $users = json_decode($request->users);

        if(!empty($users)){
           foreach ($users as $user) {
              $party->users()->create([
                 'phone' => $user->phone ,
                 'count' => $user->count
              ]);
           }

           // Subtract the number of invitations from the total number
           $user_inv = auth()->user();
           $user_inv->update([
             'event' => $user_inv->event - count($users)
           ]);
        }


    }

    // delete old users in party and Return the number of tickets to the party owner
    public function delete_old_users($party){

        $owner_party = $party->user;  // Party owner
        $users = json_decode($party->users); // Current users in the party

        // Delete old users if any
        if (!empty($users)) {

            $count_users = count($users);
            $owner_party->update([
                // Return the number of tickets to the party owner
                'event' => $owner_party->event + $count_users
            ]);

            $party->users()->delete();

        }

    }

    // Get total invitations
    public function statics_party($user){
        // Get the number of invitations purchased
        $count_events = 0 ;
        if($user['events']->count() > 0){
            foreach ($user['events'] as $event) {
               $count_events += $event->event->count ;
            }

        }

        //  Get the number of invitations that were used
        $count_users = 0 ;
        if($user['parties']->count() > 0){
           foreach ($user['parties'] as $party) {
              $count_users += $party->users()->count();
           }

        }

        $total_invataions =  $count_events + 2 ;

        $response = [
           'defult_invataions'     => 2 ,
           'puy_invataions'        => $count_events ,
           'total_invataions'      => $total_invataions ,
           'invataions_used'       => $count_users ? $count_users : 0 ,
           'remaining_invitations' => $total_invataions - $count_users ,
        ];

         return $this->ApiResponse($response , 'data found' , 200);
    }

    public function delete_party($party){
        $party->users()->delete();
        $party->delete();
        return $this->ApiResponse(true , 'party delete successfully' , 200);
    }


}










