<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_carte',
        'zone',
        'classe',
        'montant',
        'duree',
        'date_validite',
        'user_id'
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
