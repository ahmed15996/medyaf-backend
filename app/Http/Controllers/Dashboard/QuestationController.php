<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaticRequest;
use App\Repositories\Sql\QuestionRepository;
use App\Services\Admin\QuestationServuce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class QuestationController extends Controller
{
    protected $quesRepo , $quesService;

    public function __construct(QuestionRepository $quesRepo , QuestationServuce $quesService)
    {
        $this->middleware('permission:questions-read')->only(['index']);
        $this->middleware('permission:questions-create')->only(['create', 'store']);
        $this->middleware('permission:questions-update')->only(['edit', 'update']);
        $this->middleware('permission:questions-delete')->only(['destroy']);
        $this->quesRepo = $quesRepo ;
        $this->quesService = $quesService ;

    }


    public function get_questions()
    {
        return $this->quesService->get_questions();
    }

    public function index()
    {

         return view('dashboard.backend.questions.index');
    }


    public function create()
    {
         return view('dashboard.backend.questions.create');
    }


    public function store(StaticRequest $request)
    {

       $data = $request->all();
       $this->quesService->add_ques($request , $data);
       return redirect(route('admin.questions.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ques = $this->quesRepo->findOne($id);
        return view('dashboard.backend.questions.edit' , compact('ques'));

    }


    public function update(StaticRequest $request, $id)
    {
        $ques = $this->quesRepo->findOne($id);
        $data = $request->all();
        $this->quesService->update_ques($request , $data , $ques);
       return redirect(route('admin.questions.index'))->with('success', __('models.updated_successfully'));
    }


    public function destroy($id)
    {
         $ques = $this->quesRepo->findOne($id);

        if ($ques->img) {
            Storage::delete($ques->img);
        }

        $ques->delete();
        return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }
}
