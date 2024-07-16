<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUsRequest;
use App\Http\Resources\Api\BoardingResource;
use App\Http\Resources\Api\CountryResource;
use App\Http\Resources\Api\SettingResource;
use App\Http\Resources\Api\StaticResource;
use App\Repositories\Sql\BoardingRepository;
use App\Repositories\Sql\ContactUsRepository;
use App\Repositories\Sql\CountryRepository;
use App\Repositories\Sql\QuestionRepository;
use App\Repositories\Sql\SettingsRepository;
use App\Repositories\Sql\StaticPageRepository;

class HomeController extends Controller
{
    use ApiResponseTrait ;
    protected $boardRepo , $settingRepo , $staticRepo , $questionRepo , $countryRepo , $contactRepo;

    public function __construct(BoardingRepository $boardRepo , SettingsRepository $settingRepo , StaticPageRepository $staticRepo , QuestionRepository $questionRepo , CountryRepository $countryRepo , ContactUsRepository $contactRepo)
    {
       $this->boardRepo   = $boardRepo ;
       $this->settingRepo = $settingRepo ;
       $this->staticRepo  = $staticRepo ;
       $this->questionRepo= $questionRepo ;
       $this->countryRepo = $countryRepo ;
       $this->contactRepo = $contactRepo ;
    }


    public function boarding(){
        $pages = $this->boardRepo->getAll();
        return $this->ApiResponse(BoardingResource::collection($pages) , '' , 200);
    }

    public function setting(){
       $setting = $this->settingRepo->findWhere(['type' => 'setting']);
       return $setting ? $this->ApiResponse(new SettingResource($setting)) : $this->notFoundResponse();
    }

    public function terms(){
      $terms = $this->staticRepo->findWhere(['type' => 'terms']);
      return $terms ? $this->ApiResponse(new StaticResource($terms) , '' , 200): $this->notFoundResponse();
    }

    public function us(){
        $us = $this->staticRepo->findWhere(['type' => 'us']);
        return $us ? $this->ApiResponse(new StaticResource($us) , '' , 200): $this->notFoundResponse();
    }

    public function questions(){
       $questions = $this->questionRepo->getAll();
       return $this->ApiResponse(StaticResource::collection($questions) , '' , 200);
    }

    public function cities(){
       $cities = $this->countryRepo->getAll();
       return $this->ApiResponse(CountryResource::collection($cities) , '' , 200);
    }

    public function contact_us(ContactUsRequest $request){
        $data = $request->all();

        $this->contactRepo->create($data);
        return $this->ApiResponse(true , 'data send successfully' , 200);

    }
}
