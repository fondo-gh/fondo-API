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

    /**
     * A startup has one contact detail
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact_detail() {
        return $this->hasOne(ContactDetail::class);
    }

    /**
     * A startup has one business model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function business_model() {
        return $this->hasOne(BusinessModel::class);
    }


    /**
     * A startup has one product detail
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_detail() {
        return $this->hasOne(ProductDetail::class);
    }

    /**
     * A startup has one startup detail
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function startup_detail() {
        return $this->hasOne(StartupDetail::class);
    }

    /**
     * A startup has one cofounder detail
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cofounder_detail() {
        return $this->hasOne(CofounderDetail::class);
    }

    /**
     * A startup has many startup teams with members
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function startup_teams() {
        return $this->hasMany(StartupTeam::class);
    }
}
