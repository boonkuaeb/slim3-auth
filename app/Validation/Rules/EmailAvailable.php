<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 13:34
 */

namespace Slim3Auth\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use Slim3Auth\Models\User;

class EmailAvailable extends AbstractRule
{

    public function validate($input)
    {
        return User::where('email',$input)->count() ==0 ;
    }
}
