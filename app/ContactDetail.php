<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class ContactDetail extends Model
{
    use HasUuidTrait;

    protected $fillable = [
        'startup_id',
        'email',
        'phone',
        'facebook_handle',
        'twitter_handle',
        'instagram_handle',
        'linkedin_handle',
        'skype_handle',
    ];

    /**
     * Contact detail is for a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }
}
