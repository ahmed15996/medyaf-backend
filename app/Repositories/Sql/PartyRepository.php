<?php

        namespace App\Repositories\Sql;
        use App\Models\Party;
        use App\Repositories\Contract\PartyRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class PartyRepository extends BaseRepository implements PartyRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Party();

            }

        }
        