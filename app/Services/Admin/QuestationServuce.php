<?php

namespace App\Services\Admin;

use App\Repositories\Sql\QuestionRepository;
use Illuminate\Http\Request;

class QuestationServuce
{
    protected $quesRepo ;

    public function __construct(QuestionRepository $quesRepo)
    {
        $this->quesRepo    = $quesRepo ;
    }

    public function get_questions(){

        $questions = $this->quesRepo->query();
        return $this->columns($questions);
    }

    public function columns($questions){
        return DataTables($questions)

        ->editColumn('created_at' , function($ques){
            return $ques->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.questions.actions')
        ->addColumn('desc', 'dashboard.backend.questions.desc')
        ->rawColumns(['action' , 'desc'])
        ->make(true);
    }

    public function add_ques(Request $request , $data){
        $ques =$this->quesRepo->create($data);
    }

    public function update_ques(Request $request , $data , $ques){
        $ques->update($data);
    }


}
