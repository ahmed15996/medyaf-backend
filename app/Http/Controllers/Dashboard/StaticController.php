<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Http\Requests\Admin\StaticRequest;
use App\Repositories\Sql\SettingsRepository;
use App\Repositories\Sql\StaticPageRepository;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    protected $staticRepo , $settingRepo;

    public function __construct(StaticPageRepository $staticRepo , SettingsRepository $settingRepo)
    {
         $this->staticRepo  = $staticRepo ;
         $this->settingRepo = $settingRepo ;
    }

    public function about(){
       $about = $this->staticRepo->findWhere(['type' => 'about']);
      return view('dashboard.backend.statics.about' , compact('about'));
    }

    public function update_about(StaticRequest $request){
        $about = $this->staticRepo->findWhere(['type' => 'about']);
        $data = $request->except('type');
        $about['type'] = 'about' ;
        $about->update($data);
        return redirect()->route('admin.about')->with('success', 'تم تعديل البيانات بنجاح');

    }

    public function education(){
        $education = $this->staticRepo->findWhere(['type' => 'education']);
       return view('dashboard.backend.statics.education' , compact('education'));
    }

    public function update_education(StaticRequest $request){
         $education = $this->staticRepo->findWhere(['type' => 'education']);
         $data = $request->except('type');
         $education['type'] = 'education' ;
         $education->update($data);
         return redirect()->route('admin.education')->with('success', 'تم تعديل البيانات بنجاح');

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
