<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tour\Entities\Tour;

class TourBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'adult',
        'children',
        'total_price',
        'tour_id',
        'date',
        'hotel'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
