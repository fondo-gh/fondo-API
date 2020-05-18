<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class Investor extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'bio',
        'interests',
        'startups_invested_in',
        'amount_invested',
        'occupations'
    ];

    /**
     * An investor is a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
