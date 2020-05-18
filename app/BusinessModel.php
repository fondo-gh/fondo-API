<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Uuid\HasUuidTrait;

class BusinessModel extends Model
{
    use HasUuidTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'startup_id',
        'key_resources',
        'customer_target',
        'value_proposition',
        'sales_channels',
        'revenue_streams',
        'key_metrics',
        'cost_structure',
        'financial_file',
        'optional_file',
    ];


    /**
     * business model belongs to a startup
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }
}
