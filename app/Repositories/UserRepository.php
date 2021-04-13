<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Traits\ApiResponseTrait;

const PARENT_AUTHORISED = 1;
const PARENT_DECLINE = 2;
const PARENT_REFUNDED = 3;

const CHILD_AUTHORISED = 100;
const CHILD_DECLINE = 200;
const CHILD_REFUNDED = 300;

class UserRepository implements UserRepositoryInterface
{
    use ApiResponseTrait;


    public function allUsers()
    {
        return decodeProvidersJsonFile();
    }

    public function filterByProvider($provider)
    {
        return decodeSpecificProviderJsonFile($provider);
    }

    public function filterByStatusCode($statusCode)
    {
        $providersData = decodeProvidersJsonFile();

        $matchedResults = [];

        foreach ($providersData as $user) {

            //authorised case
            if ($statusCode == 'authorised') {
                if ((isset($user->statusCode) && $user->statusCode == PARENT_AUTHORISED) || (isset($user->status) && $user->status == CHILD_AUTHORISED))
                    array_push($matchedResults, $user);
            }

            //decline case
            if ($statusCode == 'decline') {
                if ((isset($user->statusCode) && $user->statusCode == PARENT_DECLINE) || (isset($user->status) && $user->status == CHILD_DECLINE))
                    array_push($matchedResults, $user);
            }

            //refunded case
            if ($statusCode == 'refunded') {
                if ((isset($user->statusCode) && $user->statusCode == PARENT_REFUNDED) || (isset($user->status) && $user->status == CHILD_REFUNDED))
                    array_push($matchedResults, $user);
            }

        }

        return $matchedResults;
    }


}
