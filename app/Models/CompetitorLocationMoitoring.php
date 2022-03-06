<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitorLocationMoitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'name',
        'address',
        'city',
        'state',
        'zipcode',
        'country',
        'brand',
        'latitude',
        'longitude',
        'source_url',
        'quarter_of_data_scraping',
        'status'
    ];
}
