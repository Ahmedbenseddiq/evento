<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = 
    [
        'title', 
        'description',
        'date', 
        'location', 
        'category_id', 
        'available_seats',
        'organizer_id',
        'approved', 
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function reservation():HasMany
    {
        return $this->hasMany(reservation::class);
    }
}
