<?php

namespace Modules\Exclusion\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exclusion\Database\factories\ExclusionFactory;
use Spatie\Translatable\HasTranslations;

class Exclusion extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title'];

    public $translatable = ['title'];

    public function tours()
    {
        return $this->belongsToMany(\Modules\Tour\Entities\Tour::class, 'exclusion_tour');
    }

    protected static function newFactory()
    {
        return ExclusionFactory::new();
    }
}
