<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

const MINUTES = 10;

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
            $currency = $request->query('currency');

            //filter by provider
            if ($provider && $statusCode && $balanceMin && $balanceMax && $currency) {
                $users = Cache::remember('filter-' . $provider . $statusCode . $balanceMin . $balanceMax . $currency, now()->addMinutes(MINUTES), function () use ($provider, $statusCode, $balanceMin, $balanceMax, $currency) {
                    return $this->userRepository->allFilters($provider, $statusCode, $balanceMin, $balanceMax, $currency);
                });

            } elseif ($provider) {
                $users = Cache::remember('filter-' . $provider, now()->addMinutes(MINUTES), function () use ($provider) {
                    return $this->userRepository->filterByProvider($provider);
                });
            } //filter by statusCode
            elseif ($statusCode) {
                $users = Cache::remember('filter-' . $statusCode, now()->addMinutes(MINUTES), function () use ($statusCode) {
                    return $this->userRepository->filterByStatusCode($statusCode);
                });
            }//filter by balance
            elseif ($balanceMin && $balanceMax) {
                $users = Cache::remember('filter-' . $balanceMin . $balanceMax, now()->addMinutes(MINUTES), function () use ($balanceMin, $balanceMax) {
                    return $this->userRepository->filterByBalance($balanceMin, $balanceMax);
                });
            }//filter by currency
            elseif ($currency) {
                $users = Cache::remember('filter-' . $currency, now()->addMinutes(MINUTES), function () use ($currency) {
                    return $this->userRepository->filterByCurrency($currency);
                });
            } else {
                //all users
                $users = Cache::remember('all-users', now()->addMinutes(MINUTES), function () {
                    return $this->userRepository->allUsers();
                });
            }
            if (count($users) > 0)
                return $this->apiResponse(UserResource::collection($users));
            else return $this->notFoundResponse('no user found');
        } catch (\Exception $e) {
            return $this->notFoundResponse('no user found');
        }
    }
}
