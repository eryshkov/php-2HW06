<?php

namespace App\Models;

class User extends Model
{
    /**
     * @var string
     */
    protected static $table = 'users';
    
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;
    
}
