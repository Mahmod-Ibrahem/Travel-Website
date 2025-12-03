<?php

namespace Modules\Review\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tour\Entities\Tour;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'title', 'content','reviewer'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
