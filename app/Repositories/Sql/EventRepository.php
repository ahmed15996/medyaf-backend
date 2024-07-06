<?php

        namespace App\Repositories\Sql;
        use App\Models\Event;
        use App\Repositories\Contract\EventRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class EventRepository extends BaseRepository implements EventRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Event();

            }

        }
        