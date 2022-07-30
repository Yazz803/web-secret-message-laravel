<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guarded = ['id'];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters){
        if(isset($filters['adminSearch']) ? $filters['adminSearch'] : false){
            return $query->where('name','like','%' . $filters['adminSearch'] . '%') 
            ->orWhere('username', 'like', '%'. $filters['adminSearch'] . '%');
        }
    }

    // public function pesans(){
    //     return $this->hasMany(Pesan::class);
    // }

    // public function komentars(){
    //     return $this->hasMany(Komentar::class);
    // }
}
