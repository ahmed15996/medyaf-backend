<?php

namespace App\Services\Admin;
use App\Repositories\Sql\BoardingRepository;
use Illuminate\Http\Request;

class BoardService
{
    protected $baordRepo ;

    public function __construct(BoardingRepository $baordRepo)
    {
        $this->baordRepo    = $baordRepo ;
    }

    public function get_boardings(){

        $boardings = $this->baordRepo->query();
        return $this->columns($boardings);
    }

    public function columns($boardings){
        return DataTables($boardings)

        ->editColumn('created_at' , function($board){
            return $board->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.boardings.actions')
        ->addColumn('desc', 'dashboard.backend.boardings.desc')
        ->rawColumns(['action' , 'desc'])
        ->make(true);
    }

    public function add_board(Request $request , $data){
        addImage($request, $data, 'img', 'boardings');
        $board =$this->baordRepo->create($data);
    }

    public function update_board(Request $request , $data , $board){
        updateImg($request, $data, 'img', 'boardings' , $board);
        $board->update($data);
    }


}
