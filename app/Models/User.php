<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'phone',
        'sexe',
        'email',
        'password',
        'role_name',
        'groupe',
        'specialite_Docteur',
        'qualification_infirmier',
    ];

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

    // 	Page ya login ikoresha bose: docteur, infirmier,administrateur

    public function isAdmin(){
        return $this->role_name == 'admin';
    }
    public function isDocteur(){
        return $this->role_name == 'DOCTEUR';
    }
    public function isInfirmier(){
        return $this->role_name == 'INFIMIER';
    }
}
