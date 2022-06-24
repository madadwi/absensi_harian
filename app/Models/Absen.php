<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('users.name', 'like', '%' . $search . '%')->orWhere('users.nis', 'like', '%' . $search . '%');
        });
    }

    /**
     * Get the user that owns the Absen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the riwayats for the Absen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }
}
