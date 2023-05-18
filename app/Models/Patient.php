<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'patient_id',
        'address',
        'phone',
        'chef_famille',
        'sexe',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birthday' => 'datetime',
    ];

    public function getPatientIdAttribute(){
        return "A" .str_pad($this->id,5,"0",STR_PAD_LEFT);
    }
}
