<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['project_id', 'paid_amount', 'payer_first_name', 'payer_last_name', 'payer_email', 'payer_phone', 'payer_comment'];

    /**
     * Get the project that owns the donation.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
