<?php

namespace App\Models;

use App\Models\Compte;
use App\Models\Notification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'contact',
        'type',
        'password_confirmation',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function compte()
    {
       return $this->hasOne(Compte::class);
    }

    public function notifications()
    {
       return $this->hasMany(Notification::class);
    }
    public function commandes()
    {
       return $this->hasMany(Commande::class);
    }

    public function hasActiveAccount(){
        if($this->compte){
            return $this->compte->status;
        }
        return false;
    }

    public function hasAccount(){

        return $this->compte  ? true : false;
    }
    public function totalNotif(){
        if($this->notifications){
            return $this->notifications->where('status', 0)->count();
        }
        return false;
    }


}
