<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class ProductProgress extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var string
     */
    protected $table = 'product_progresses';
}
