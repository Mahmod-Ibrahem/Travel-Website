<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function translations()
    {
        return $this->hasMany(FaqTranslation::class);
    }

    public function translation($locale)
    {
        return $this->translations()->where('locale', $locale)->first();
    }
}
