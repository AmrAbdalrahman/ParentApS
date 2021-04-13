<?php

namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function allUsers();

    public function filterByProvider($provider);

    public function filterByStatusCode($statusCode);

    public function filterByBalance($min, $max);

    public function filterByCurrency($currency);

    public function allFilters($provider, $statusCode, $min, $max, $currency);

}
