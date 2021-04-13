<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Traits\ApiResponseTrait;

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


}
