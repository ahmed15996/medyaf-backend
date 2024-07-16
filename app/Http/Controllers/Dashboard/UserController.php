<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SendNotifyRequest;
use App\Models\EventUser;
use App\Models\User;
use App\Repositories\Sql\CountryRepository;
use App\Repositories\Sql\EventUserRepository;
use App\Repositories\Sql\PartyRepository;
use App\Repositories\Sql\UserRepository;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepo , $userService , $countryRepo , $eventRepo , $partyRepo;

    public function __construct(UserRepository $userRepo , UserService $userService , CountryRepository $countryRepo , EventUserRepository $eventRepo , PartyRepository $partyRepo)
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
        $this->userRepo    = $userRepo ;
        $this->countryRepo = $countryRepo ;
        $this->userService = $userService ;
        $this->eventRepo   = $eventRepo ;
        $this->partyRepo   = $partyRepo ;

    }


    public function get_users(Request $request)
    {

        return $this->userService->get_users($request);

    }

    public function index()
    {
        $countries = $this->countryRepo->getAll();
        return view('dashboard.backend.users.index' , compact('countries'));
    }

    public function show($id){
        $user = User::with(['parties' , 'events'])->where('id' , $id)->first();
        return view('dashboard.backend.users.show' , compact('user'));
    }



    public function destroy($id)
    {
        $user = $this->userRepo->findOne($id);
        if ($user->img) {
            Storage::delete($user->img);
        }
        $user->delete();
        return \response()->json([
            'message' => __('models.deleted_successfully')
        ]);
    }


    public function changeActiveUser(Request $request){
        $user = $this->userRepo->findOne($request->id);
        return $this->userService->cahnge_active($user , $request);
    }

    public function get_user_events(Request $request){
        $user_id = $request->query('user_id');
        $events =  $this->eventRepo->query()->where('user_id' , $user_id);
        return $this->userService->get_events($events);
    }


    public function get_user_parties(Request $request){
        $user_id = $request->query('user_id');
        $parties =  $this->partyRepo->query()->where('user_id' , $user_id);
        return $this->userService->get_parties($parties);
    }

    public function user_notify($id){
      $user = $this->userRepo->findOne($id);
      return view('dashboard.backend.users.send-notify' , compact('user'));
    }

    public function send_user_notify(SendNotifyRequest $request , $id){
        $user = $this->userRepo->findOne($id);
        $this->userService->send_notify($request , $user);
        return redirect(route('admin.users.index'))->with('success', __('models.send_notify_successfully'));

    }






}
