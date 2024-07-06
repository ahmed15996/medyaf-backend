<?php

        namespace App\Repositories\Sql;
        use App\Models\Boarding;
        use App\Repositories\Contract\BoardingRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class BoardingRepository extends BaseRepository implements BoardingRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Boarding();

            }

        }
        