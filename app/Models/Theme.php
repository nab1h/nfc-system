<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'theme',
        'img',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
