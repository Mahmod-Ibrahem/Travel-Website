<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    use HasFactory , Sluggable;

    protected $fillable = ['category_id', 'group', 'preference', 'title', 'description', 'tour_cover', 'itenary_title',
        'itenary_section', 'included', 'excluded', 'duration', 'price_per_person', 'price_two_five', 'price_six_twenty'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class, 'tours_id', 'id');
    }

//    public function url()
//    {
//        return Storage::url($this->path);// da aly b generate storage/public url
//    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

