<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'specialite',
        'description',
        // 'video',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
