<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\CountryRepository;
use App\Repositories\Sql\UserRepository;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepo , $userService , $countryRepo;

    public function __construct(UserRepository $userRepo , UserService $userService , CountryRepository $countryRepo)
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
        $this->userRepo    = $userRepo ;
        $this->countryRepo = $countryRepo ;
        $this->userService = $userService ;

    }


    public function get_users()
    {

        return $this->userService->get_users();

    }

    public function index()
    {
        $countries = $this->countryRepo->getAll();
        return view('dashboard.backend.users.index' , compact('countries'));
    }



    public function destroy($id)
    {
        $user = $this->userRepo->findOne($id);
        if ($user->img) {
            Storage::delete($user->img);
        }
        $user->delete();
        return redirect(route('admin.users.index'))->with('success', __('models.deleted_successfully'));
    }


    public function changeActiveUser(Request $request){
        $user = $this->userRepo->findOne($request->id);
        return $this->userService->cahnge_active($user , $request);


    }






}
