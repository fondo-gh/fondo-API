<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class CofounderDetail extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'startup_id',
        'funding_amount',
        'rate_of_devotion'
    ];

    /**
     * A startup has many co-founders
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cofounders() {
        return $this->hasMany(Cofounder::class);
    }

    /**
     * Co-founder details link to a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup() {
        return $this->belongsTo(Startup::class);
    }
}
