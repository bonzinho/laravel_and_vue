<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserFromRequest;
use App\User;
use App\Http\Controllers\Auth\Api\Traits\AuthTrait;

class ProfileApiController extends Controller
{

    use AuthTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }


    public function register(StoreUpdateUserFromRequest $request, User $user){
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->create($data);
        return $this->authenticate();
    }

    public function update(StoreUpdateUserFromRequest $request){
        $response = $this->getUser();

        if($response['status'] != 200){
            return response()->json([$response['response']], $response['status']);
        }

        $user = $response['response'];
        $user->update($request->all());

        return response()->json(compact($user));
    }
}
