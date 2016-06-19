<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 11:48
 */

namespace Slim3Auth\Models;
use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';


    protected $fillable = [
        'email','name','password'
    ];

    public function setPassword($password)
    {
     $this->update([
         'password' => password_hash($password , PASSWORD_DEFAULT)
     ]);
    }
}
