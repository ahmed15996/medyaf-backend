<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PartyUser;
use App\Repositories\Sql\PartyRepository;
use App\Repositories\Sql\UserRepository;
use App\Services\Admin\PartyService;
use Illuminate\Http\Request;



class PartyController extends Controller
{
    protected $partyRepo , $partyService , $userRepo;
    public function __construct(PartyRepository $partyRepo ,PartyService $partyService , UserRepository $userRepo)
    {
        $this->middleware('permission:parties-read')->only(['index']);
        $this->partyRepo    = $partyRepo ;
        $this->userRepo     = $userRepo ;
        $this->partyService = $partyService ;

    }


    public function get_parties(Request $request)
    {
        return $this->partyService->get_parties($request);
    }

    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('dashboard.backend.parties.index' , compact('users'));
    }

    public function show($id)
    {
        $party = $this->partyRepo->findOne($id);
        return view('dashboard.backend.parties.show' , compact('party'));
    }

    public function get_party_users(Request $request){
        $party_id = $request->query('party_id');
        $users = PartyUser::query()->where('party_id' , $party_id);
        return $this->partyService->users_columns($users);

    }


}
