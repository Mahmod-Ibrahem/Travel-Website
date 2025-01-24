<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['type','image'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

}
