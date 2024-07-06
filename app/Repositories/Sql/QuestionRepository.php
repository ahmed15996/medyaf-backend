<?php

        namespace App\Repositories\Sql;
        use App\Models\Question;
        use App\Repositories\Contract\QuestionRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Question();

            }

        }
        