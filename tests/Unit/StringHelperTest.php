<?php

declare(strict_types=1);

use SamihSoylu\Utility\StringHelper;

it('generates a unique random string', function () {
    $string1 = StringHelper::createRandomString();
    $string2 = StringHelper::createRandomString();

    expect($string1)->not->toBe($string2)
        ->and($string1)->not->toBeEmpty()
        ->and($string2)->not->toBeEmpty();
});
