<?php

namespace App\Services\Admin;

use App\Models\Party;
use App\Repositories\Sql\PartyRepository;
use Carbon\Carbon;

class PartyService
{
    protected $partyRepo ;

    public function __construct(PartyRepository $partyRepo)
    {
        $this->partyRepo    = $partyRepo ;
    }

    public function get_parties($request){
        $parties = Party::query()->with(['users' , 'user']);
        if($request->has('date') && $request->date != '') {
            $parties->whereDate('date', $request->date);
        }
       
        orderById($request , $parties);
        return $this->columns($parties);
    }

    public function columns($parties){
        return DataTables($parties)
        ->filterColumn('user', function($query , $keyword) {
            $query->whereRelation('user' , 'id' , $keyword);
        })
        ->editColumn('user' , function($party){
            return $party->user->name;
        })
        ->editColumn('time' , function($party){
            return Carbon::parse($party->time)->format('h:i A');
        })
        ->addColumn('action', 'dashboard.backend.parties.actions')
        ->rawColumns(['action'])
        ->make(true);
    }




}
