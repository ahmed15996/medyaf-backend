<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Http\Requests\Admin\StaticRequest;
use App\Repositories\Sql\SettingsRepository;
use App\Repositories\Sql\StaticPageRepository;

class StaticController extends Controller
{

    protected $staticRepo , $settingRepo;

    public function __construct(StaticPageRepository $staticRepo , SettingsRepository $settingRepo)
    {
         $this->staticRepo  = $staticRepo ;
         $this->settingRepo = $settingRepo ;
    }

    public function us(){
       $us = $this->staticRepo->findWhere(['type' => 'us']);
      return view('dashboard.backend.statics.us' , compact('us'));
    }

    public function update_us(StaticRequest $request){
        $us = $this->staticRepo->findWhere(['type' => 'us']);
        $data = $request->except('type');
        $us['type'] = 'us' ;
        $us->update($data);
        return redirect()->route('admin.us')->with('success', 'تم تعديل البيانات بنجاح');

    }

    public function terms(){
        $terms = $this->staticRepo->findWhere(['type' => 'terms']);
       return view('dashboard.backend.statics.terms' , compact('terms'));
    }

    public function update_terms(StaticRequest $request){
         $terms = $this->staticRepo->findWhere(['type' => 'terms']);
         $data = $request->except('type');
         $terms['type'] = 'terms' ;
         $terms->update($data);
         return redirect()->route('admin.terms')->with('success', 'تم تعديل البيانات بنجاح');

    }

    public function setting(){
        $setting = $this->settingRepo->findWhere(['type' => 'setting']);
       return view('dashboard.backend.setting.setting' , compact('setting'));
    }

    public function update_setting(SettingRequest $request){
        $setting = $this->settingRepo->findWhere(['type' => 'setting']);
        $data = $request->except('1');
        $setting->update($data);
        return redirect()->route('admin.setting')->with('success', 'تم تعديل البيانات بنجاح');
    }
}
