<?php

function decodeProvidersJsonFile()
{
    //list provider names
    $providers = ['DataProviderX', 'DataProviderY'];
    $providerData = [];
    foreach ($providers as $provider) {
        $providerData[] = json_decode(file_get_contents(storage_path() . "/json/$provider.json"));
    }
    return $providerData;
}







