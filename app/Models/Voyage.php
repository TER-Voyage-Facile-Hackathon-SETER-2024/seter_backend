<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = [
        'depart',
        'destination',
        'zone',
        'prix',
        'classe',
        'date',
        'train_id',
        'user_id'
    ];

    public function train():BelongsTo {
        return $this->belongsTo(Train::class);
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
