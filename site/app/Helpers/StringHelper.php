<?php

namespace App\Helpers;

use Propaganistas\LaravelPhone\PhoneNumber;

class StringHelper
{
    /**
     * Get country in ISO format from phone number string
     *
     * @param string $phone
     * @return string|null
     */
    public static function getCountryFromPhone(string $phone): ?string
    {
        if (!$phone = new PhoneNumber($phone)) return null;

        return $phone->getCountry();
    }
}
