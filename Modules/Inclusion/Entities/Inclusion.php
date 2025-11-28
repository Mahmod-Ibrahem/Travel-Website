<?php

namespace Modules\Inclusion\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inclusion\Database\factories\InclusionFactory;
use Spatie\Translatable\HasTranslations;

class Inclusion extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title'];

    public $translatable = ['title'];

    public function tours()
    {
        return $this->belongsToMany(\Modules\Tour\Entities\Tour::class, 'inclusion_tour');
    }

    protected static function newFactory()
    {
        return InclusionFactory::new();
    }
}
