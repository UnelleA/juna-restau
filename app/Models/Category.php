<?php

namespace App\Models;

use App\Models\met;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function mets()
    {
        return $this->hasMany(met::class);
    }
}
