<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'featured'
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
        return number_format($this->price, 2) . ' €';
    }
}
