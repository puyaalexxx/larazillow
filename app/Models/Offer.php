<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static make(array $validate)
 * @property mixed $id
 */
class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'accepted_at', 'rejected_at'
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeByMe(Builder $query): Builder
    {
        return $query->where('user_id', Auth::user()?->id);
    }
}
