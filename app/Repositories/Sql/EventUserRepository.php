<?php

        namespace App\Repositories\Sql;
        use App\Models\EventUser;
        use App\Repositories\Contract\EventUserRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class EventUserRepository extends BaseRepository implements EventUserRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new EventUser();

            }

        }
        