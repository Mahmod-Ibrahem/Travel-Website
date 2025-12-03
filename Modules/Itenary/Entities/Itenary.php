<?php

namespace Modules\Itenary\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tour\Entities\Tour;
use Spatie\Translatable\HasTranslations;

class Itenary extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['tour_id', 'title', 'description'];
    public $translatable = ['title', 'description'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
