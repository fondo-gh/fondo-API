<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'company_name',
        'product_image',
        'caption',
        'funds_to_raise',
        'duration_for_raise',
        'user_id',
        'approved'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'approved' => 'boolean'
    ];

    /**
     * Startup belongs to user, Entrepreneur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
