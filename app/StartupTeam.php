<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class StartupTeam extends Model
{
    use HasUuidTrait;


    /**
     * @var string[]
     */
    protected $fillable = [
        'startup_id',
        'business_team_id',
        'name'
    ];


    /**
     * startup team belongs to a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    /**
     * startup team is one of a business team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business_team()
    {
        return $this->belongsTo(BusinessTeam::class);
    }
}
