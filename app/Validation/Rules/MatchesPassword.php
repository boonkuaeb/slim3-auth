<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 17:12
 */

namespace Slim3Auth\Validation\Rules;

use Slim3Auth\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule
{
    protected $password;

    public function __construct($password)
    {
           $this->password = $password;
    }

    public function validate($input)
    {
        return password_verify($input,$this->password);
    }
}
