<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'startup_id',
        'product_progress_id',
        'product_url'
    ];

    /**
     * Product detail belongs to a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup() {
        return $this->belongsTo(Startup::class);
    }

    /**
     * A product has a progress
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_progress() {
        return $this->belongsTo(ProductProgress::class);
    }
}
