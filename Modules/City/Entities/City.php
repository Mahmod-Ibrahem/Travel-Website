<?php

namespace Modules\City\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Blog;

class City extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug', 'image'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true, //To Change Slug WhenEver Title Field Is Changed
            ]
        ];
    }
    public function getRouteKeyName(): string //reslove this model by slug not id
    {
        return 'slug';
    }
}
