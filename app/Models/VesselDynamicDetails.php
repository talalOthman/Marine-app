<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselDynamicDetails extends Model
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
        'lat',
        'long',
        'cog',
        'heading',
        'rate_of_turn',
        'sog',
        'vessel_id',
    ];
}
