<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessTeam extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
      'name', 'description'
    ];
}
