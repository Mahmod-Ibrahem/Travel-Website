<?php

namespace Modules\Faq\Entities;

use App\Models\FaqTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
