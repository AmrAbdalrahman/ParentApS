<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function filter(Request $request)
    {
        try {
            $users = [];
            //filter by provider
            $provider = $request->query('provider');
            if ($provider) {
                $users = decodeSpecificProviderJsonFile($provider);
            } else {
                //all users
                $users = $this->userRepository->allUsers();
            }
            if (count($users) > 0)
                return $this->apiResponse(UserResource::collection($users));
            else return $this->notFoundResponse('no user found');
        } catch (\Exception $e) {
            return $this->notFoundResponse('no user found');
        }


    }
}
