<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'first_name',
        'first_name_slug',
        'last_name',
        'last_name_slug',
        'email',
        'phone',
        'avatar',
        'registration_date',
    ];

    protected function casts(): array
    {
        return [
            'registration_date' => 'date',
        ];
    }

    public function fidelityPoint(): HasOne
    {
        return $this->hasOne(FidelityPoint::class);
    }

    public function pointsHistories(): HasMany
    {
        return $this->hasMany(PointsHistory::class);
    }
}
