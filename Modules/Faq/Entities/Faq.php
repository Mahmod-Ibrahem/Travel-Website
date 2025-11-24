<?php

namespace Modules\Faq\Entities;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['question', 'answer'];
    public $translatable = ['question', 'answer'];
}
