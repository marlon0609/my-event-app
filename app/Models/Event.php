<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; // Add this line to import the User model

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'price',
        'capacity',
        'status',
        'category',
        'featured',
        'user_id'
    ];
    
    protected $casts = [
        'date' => 'datetime',
        'price' => 'decimal:2',
        'featured' => 'boolean'
    ];
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now());
    }
    
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d M Y');
    }
    
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' FCFA';
    }

    // Relation propriétaire
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
