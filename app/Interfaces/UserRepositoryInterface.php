<?php

namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function allUsers();
    public function filterByProvider($provider);

}
