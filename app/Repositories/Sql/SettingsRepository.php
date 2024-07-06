<?php

        namespace App\Repositories\Sql;
        use App\Models\Setting;
        use App\Repositories\Contract\SettingsRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class SettingsRepository extends BaseRepository implements SettingsRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Setting();

            }

        }
