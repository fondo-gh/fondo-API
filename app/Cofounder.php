<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cofounder extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'cofounder_role_id',
        'cofounder_detail_id',
    ];

    /**
     * A co-founder has a role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cofounder_role(){
        return $this->belongsTo(CofounderRole::class);
    }

    /**
     * A co-founder is associated to a startup co founder detail
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cofounder_detail(){
        return $this->belongsTo(CofounderDetail::class);
    }
}
