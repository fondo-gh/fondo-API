<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class StartupIndustry extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}
