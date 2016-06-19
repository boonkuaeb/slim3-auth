<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 13:40
 */

namespace Slim3Auth\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email is already taken.'
        ]
    ];
}
