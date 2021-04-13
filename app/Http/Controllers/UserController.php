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
            $provider = $request->query('provider');
            $statusCode = $request->query('statusCode');
            $balanceMin = $request->query('balanceMin');
            $balanceMax = $request->query('balanceMax');

            //filter by provider
            if ($provider) {
                $users = decodeSpecificProviderJsonFile($provider);
            } //filter by statusCode
            elseif ($statusCode) {
                $users = $this->userRepository->filterByStatusCode($statusCode);
            }//filter by balance
            elseif ($balanceMin && $balanceMax) {
                $users = $this->userRepository->filterByBalance($balanceMin, $balanceMax);
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
