<?php

namespace Modules\Tour\Entities;

use App\Models\TourImage;
use App\Models\TourTranslation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Modules\Location\Entities\Location;
use Modules\Review\Entities\Review;

use Spatie\Translatable\HasTranslations;

class Tour extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['category_id', 'group', 'preference', 'tour_cover', 'price_per_person', 'price_two_five', 'price_six_twenty', 'slug', 'title', 'description', 'itenary_title', 'itenary_section', 'included', 'excluded', 'duration', 'places'];
    public $translatable = ['slug', 'title', 'description', 'itenary_title', 'itenary_section', 'included', 'excluded', 'duration', 'places'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class, 'tours_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'tour_id', 'id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'tour_locations', 'tour_id', 'location_id');
    }

    public function scopeWithTranslations(Builder $query): Builder
    {
        return $query->with(['category']);
    }
}
