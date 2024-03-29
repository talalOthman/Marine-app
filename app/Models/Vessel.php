<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
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
        'MMSI',
        'ais_channel',
    ];

    public function scopeAllSpecific($query)
    {
        return $query->get(['MMSI', 'ais_channel']);
    }
}
