<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['Tourtype','OfferType','city','title','places','price','path','itenary_title',
    'itenary_section','included','excluded','Duration','MaxPeople'];

    public function url()
    {
        return Storage::url($this->path);// da aly b generate storage/public url
    }
}

