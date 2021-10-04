<?php

namespace App\Models;

use App\Models\Compte;
use App\Models\met;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'compte_id',
    ];

    public function mets()
    {
        return $this->hasMany(met::class);
    }

    public function company(){
        return $this->belongsTo(Compte::class);
    }
}
