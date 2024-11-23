<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{

    protected  $fillable = ['image_url','tours_id'];
    use HasFactory;
}
