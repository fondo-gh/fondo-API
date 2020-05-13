<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    /**
     * Constants for user type
     */
    const USER_TYPE_ENTREPRENEUR_ID = 1;
    const USER_TYPE_INVESTOR_ID = 2;

    /**
     * @var string[]
     */
    protected $fillable = [
      'name'
    ];

}
