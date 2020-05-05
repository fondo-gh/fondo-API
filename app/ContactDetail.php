<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = [
        'startup_id',
        'email',
        'phone',
        'facebook_handle',
        'twitter_handle',
        'instagram_handle',
        'linkedin_handle',
        'skype_handle'
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
