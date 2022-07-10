<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    //to turn of just one field
    const UPDATED_AT = null;
    //to turn off timestamp completely
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_time',
        'MMSI',
        'rot',
        'sog',
        'lat',
        'long',
        'cog',
        'true_heading',
        'timestamp',
        'ais_channel',
    ];

    public function scopeAllSpecific($query)
    {
        return $query->get(['date_time', 'MMSI', 'rot', 'sog', 'lat', 'long', 'cog', 'true_heading', 'timestamp', 'ais_channel']);
    }
}
