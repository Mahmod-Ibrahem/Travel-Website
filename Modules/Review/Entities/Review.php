<?php

namespace Modules\Review\Entities;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'title', 'content','reviewer'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
