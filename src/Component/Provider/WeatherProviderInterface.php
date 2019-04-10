<?php 

namespace App\Component\Provider;

use App\Factory\WeatherFactoryInterface;

interface WeatherProviderInterface
{
    /**
     * @param int $providerType
     *
     * @return WeatherFactoryInterface
     */

    public function getProvider(int $type): WeatherFactoryInterface;
}

