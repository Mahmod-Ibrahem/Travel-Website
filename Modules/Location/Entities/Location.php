<?php

namespace Modules\Location\Entities;

use App\Models\Tour;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, sluggable;

    protected $fillable = ['slug', 'name', 'image', 'position'];

    protected $translatable = ['name'];


    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_locations');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Location\Database\factories\LocationFactory::new();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($location) {
            $max = Location::max('position');
            $location->position = $max + 10 ? $max + 10 : 10;
        });
    }
}
