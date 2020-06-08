<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'description', 'full_amount', 'paid_amount', 'thumbnail', 'deadline'];

    /**
     * Get the donations for project.
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
