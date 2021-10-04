<?php

namespace App\Models;

use App\Models\Category;
use App\Models\met;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'specialite',
        'description',
        // 'video',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function mets(){
        return $this->hasMany(met::class);
    }
}
