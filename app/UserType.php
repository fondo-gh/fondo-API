<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class UserType extends Model
{
    use HasUuidTrait;

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
