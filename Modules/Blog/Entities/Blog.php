<?php

namespace Modules\Blog\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\City;

class Blog extends Model
{
    use HasFactory , Sluggable;

    protected $fillable = ['slug', 'title', 'blog', 'image','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title',
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
