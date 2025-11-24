<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tour\Entities\Tour;

use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['type', 'image', 'slug', 'name', 'header', 'bg_header', 'description', 'title_meta', 'description_meta'];
    public $translatable = ['slug', 'name', 'header', 'bg_header', 'description', 'title_meta', 'description_meta'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
