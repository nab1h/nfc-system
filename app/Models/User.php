<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_SALES = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'bio',
        'job',
        'img',
        'img_cover',
        'whatsapp',
        'phone',
        'theme_id',
        'is_active',
        'role',
        'is_started',
        'is_count',
        'has_card',
        'comment'
    ];
    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->slug = $user->id;
            $user->save();
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
