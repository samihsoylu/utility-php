<?php

declare(strict_types=1);

namespace SamihSoylu\Utility;

final class StringHelper
{
    public static function createRandomString(): string
    {
        $randomPrefix = rtrim(base64_encode((string) time()), '=');

        return uniqid($randomPrefix);
    }
}
