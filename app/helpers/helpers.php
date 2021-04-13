<?php

function decodeProvidersJsonFile()
{
    //list provider names
    $providers = ['DataProviderX', 'DataProviderY'];
    $providersData = [];
    foreach ($providers as $provider) {
        $providerData = json_decode(file_get_contents(storage_path() . "/json/$provider.json"));
        $providersData[] = $providerData->data;
    }
    return array_merge(...$providersData);
}

function decodeSpecificProviderJsonFile($provider)
{
    $providerData = json_decode(file_get_contents(storage_path() . "/json/$provider.json"));
    return $providerData->data;
}







