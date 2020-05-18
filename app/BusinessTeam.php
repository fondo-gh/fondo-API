<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class BusinessTeam extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
      'name', 'description'
    ];
}
