<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;


class reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'client_id',
        'event_id',
    ];



    public function event():BelongsTo
    {
        return $this->belongsTo(event::class);
    }
}
