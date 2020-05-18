<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class  StartupDetail extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'startup_id',
        'startup_type_id',
        'startup_industry_id',
        'has_patent',
        'location'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'has_patent' => 'boolean'
    ];

    /**
     * startup detail belongs to a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    /**
     * startup belongs to a startup type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup_type()
    {
        return $this->belongsTo(StartupType::class);
    }

    /**
     * startup belongs to a startup industry ie Health etc
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup_industry()
    {
        return $this->belongsTo(StartupIndustry::class);
    }
}
