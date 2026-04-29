<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }
}
