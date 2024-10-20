<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'stripe_id',
        'price',
        'active',
        'teams_limit',
        'trial_period_days',
        'interval',
        'store_access_count',
        'product_access_count',

    ];
}
