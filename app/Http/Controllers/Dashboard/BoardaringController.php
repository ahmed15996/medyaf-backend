<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BoardRequest;
use App\Repositories\Sql\BoardingRepository;
use App\Services\Admin\BoardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class BoardaringController extends Controller
{
    protected $boardRepo , $boardService;
    public function __construct(BoardingRepository $boardRepo , BoardService $boardService)
    {
        $this->middleware('permission:boardings-read')->only(['index']);
        $this->middleware('permission:boardings-create')->only(['create', 'store']);
        $this->middleware('permission:boardings-update')->only(['edit', 'update']);
        $this->middleware('permission:boardings-delete')->only(['destroy']);
        $this->boardRepo = $boardRepo ;
        $this->boardService = $boardService ;

    }


    public function get_boardings()
    {
        return $this->boardService->get_boardings();
    }

    public function index()
    {

         return view('dashboard.backend.boardings.index');
    }


    public function create()
    {
         return view('dashboard.backend.boardings.create');
    }


    public function store(BoardRequest $request)
    {

       $data = $request->except('img');
       $this->boardService->add_board($request , $data);
       return redirect(route('admin.boardings.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $board = $this->boardRepo->findOne($id);

        return view('dashboard.backend.boardings.edit' , compact('board'));

    }


    public function update(BoardRequest $request, $id)
    {
       $board = $this->boardRepo->findOne($id);
        $data = $request->except('img' );
       $this->boardService->update_board($request , $data ,$board);
       return redirect(route('admin.boardings.index'))->with('success', __('models.updated_successfully'));
    }


    public function destroy($id)
    {
        $board = $this->boardRepo->findOne($id);

        if ($board->img) {
            Storage::delete($board->img);
        }

       $board->delete();
        return redirect(route('admin.boardings.index'))->with('success', __('models.deleted_successfully'));

    }
}
