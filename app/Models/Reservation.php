<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'transaction_id',
        'quantity',
        'amount',
        'currency',
        'status',
        'reference',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'amount' => 'integer',
        'quantity' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
