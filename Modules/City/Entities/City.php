<?php

namespace Modules\City\Entities;

use App\Models\Blog;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory ,Sluggable;

    protected $fillable=['name','slug','image'];

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
