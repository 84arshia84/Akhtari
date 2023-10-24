<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Factor extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'factor_name',
        'factor_cost'

    ];

    public function orders(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
