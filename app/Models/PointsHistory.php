<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointsHistory extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'client_id',
        'transaction_type',
        'points',
        'transaction_date',
        'description',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    protected function casts()
    {
        return [
            'transaction_date' => 'date',
        ];
    }
}
