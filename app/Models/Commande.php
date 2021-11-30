<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'lieu_livraison',
        'ville_livraison',
        'mets_title',
        'mets_price',
        'mets_quantity',
        'mets_note',
        'compte_id',
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
