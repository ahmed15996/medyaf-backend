<?php

namespace App\Services\Api;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Http\Resources\Api\UserResource;
use Illuminate\Http\Request;
use App\Repositories\Sql\UserRepository;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthService
{

    use HelperTrait , ApiResponseTrait;
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
          $this->userRepo = $userRepo ;
    }

    public function register(Request $request , $data){

        $data['type'] = 'email' ;
        $data['password'] = bcrypt($request->password);
        $data['email_verified_at'] =  now();
        $data['remember_token'] = Str::random(10);
        $user = $this->userRepo->create($data);
        return $this->userResource($user);
    }


    public function login(Request $request){
            $user = $this->userRepo->getWhere([ ['email' , $request->email] , ['is_active' , 0 ] ])->first();
            if($user &&  Hash::check($request->password, $user->password)) {
                $user->update([
                  'device_key' => $request->device_key
                ]);
               return $this->userResource($user);
            }else{
                return $this->ApiResponse([] ,'Email & Password does not match with our record.', 403);
            }

    }

    public function login_with_social(Request $request){
        if($request->type == 'gmail'){
            $user = $this->userRepo->getWhere([ ['email' , $request->email] , ['uid' , $request->uid] , ['type' , 'gmail'] , ['is_active' , 0 ] ])->first();
            if($user){
                $user->update([
                    'device_key' => $request->device_key ,
                    'phone_type' => $request->phone_type
                ]);
                return $this->userResource($user) ;
            }else{
                $check_email = $this->userRepo->findWhere(['email' => $request->email]);
                if($check_email){
                    return $this->ApiResponse([] , 'الايميل موجود مسبقا' , 403);
                }
                $data  = $request->only('name' , 'email' , 'uid' , 'type' , 'phone_type' , 'device_key');
                $data['email_verified_at'] =  now();
                $data['remember_token'] = Str::random(10);
                $user = $this->userRepo->create($data);
                return $this->userResource($user);
            }
        }elseif($request->type == 'apple'){
            $user = $this->userRepo->getWhere([ ['email' , $request->email] , ['uid' , $request->uid] , ['type' , 'apple'] , ['is_active' , 0 ] ])->first();
            if($user){
                $user->update([
                    'device_key' => $request->device_key ,
                    'phone_type' => $request->phone_type
                ]);
                return $this->userResource($user) ;
            }else{
                $check_email = $this->userRepo->findWhere(['email' => $request->email]);
                if($check_email){
                    return $this->ApiResponse([] , 'الايميل موجود مسبقا' , 403);
                }
                $data  = $request->only('name' , 'email' , 'uid' , 'type', 'phone_type' , 'device_key');
                $data['email_verified_at'] =  now();
                $data['remember_token'] = Str::random(10);
                $user = $this->userRepo->create($data);
                return $this->userResource($user);
            }
        }else{
            return $this->notFoundResponse();
        }
    }

    public function get_user($user){
        if ($user) {
            return $this->ApiResponse(new UserResource($user), 'user found successfully', 200);
        } else {
            return $this->notFoundResponse();
        }
    }


    public function change_password(Request $request){
        $user = $this->userRepo->getWhere([ ['type' , 'email'] , ['id' , auth()->user()->id] ])->first();

        if ($user) {

            if (Hash::check($request->old_password, $user->password) ){
                $user->update(['password' => bcrypt($request->password)]);
                return $this->userResource($user);
            } else {
                return $this->ApiResponse(null, __('api.old_password_not_found'), 422);
            }
        } else {
            return $this->ApiResponse(null, __('api.token_not_found'), 404);
        } // end of else user
    }

    public function update_user(Request $request){
        $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
        if ($user) {
            $data = $request->only('name' , 'email' , 'country_id');
            $user->update($data);
            return $this->userResource($user);
        }
    }


    public function userResource($user) {
        $token = $user->createToken('tokens')->plainTextToken;
        $data = [
            'user' => new UserResource($user),
            'token'  => $token
        ];
        return $this->ApiResponse($data, 'data successfully', 200);
    }







}
