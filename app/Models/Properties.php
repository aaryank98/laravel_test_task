<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable  = ['county', 'uuid', 'country', 'town', 'description', 'address', 'num_bedrooms', 'num_bathrooms', 'price', 'property_type_id', 'image_full', 'image_thumbnail', 'latitude', 'longitude'];
}
