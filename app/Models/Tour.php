<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','group','preference','title','description','tour_cover','itenary_title',
    'itenary_section','included','excluded','duration','price_per_person','price_plane'];

    public function url()
    {
        return Storage::url($this->path);// da aly b generate storage/public url
    }
}

