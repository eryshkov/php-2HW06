<?php

namespace App\Models;

class Author extends Model
{
    /**
     * @var string
     */
    protected static $table = 'authors';

    /**
     * @var string
     */
    public $name;
}
