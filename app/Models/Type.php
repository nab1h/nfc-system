<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'type_id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'type_property', 'type_id', 'property_id');
    }
}
