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
        'interest',
        'startups_invested_in',
        'amount_invested',
        'occupation',
        'profile_is_completed'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'profile_is_completed' => 'boolean'
    ];

    /**
     * An investor is a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
