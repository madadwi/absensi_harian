<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'nis',
        'rombel_id',
        'rayon_id',
        'username',
        'email',
        'password',
        'role',
        'avatar',
        'is_edited',
        'hash'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the rayon that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    /**
     * Get the rombel that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    /**
     * Get all of the absens for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absens()
    {
        return $this->hasMany(Absen::class);
    }

    /**
     * Get all of the riwayats for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')->orWhere('nis', 'like', '%' . $search . '%');
        });
    }
}
