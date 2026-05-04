<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name'];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'type_property', 'property_id', 'type_id');
    }
}
