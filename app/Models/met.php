<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Compte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class met extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function getPrice()
    {
        $price = $this->price;

        return number_format($price, 20, ', ',' '). ' FCFA';
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

     public function company(){
        return $this->belongsTo(Compte::class);
    }
}
