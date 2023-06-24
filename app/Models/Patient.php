<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Prescription;

/**
 * @mixin IdeHelperPatient
 */
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
        'sexe',
        'phone',
        'chef_famille',
        'groupe_sanguin',
        'nationalite',
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

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
    public function diagnostics(){
        return $this->hasMany(Diagnostic::class);
    }

    public function getPatientIdAttribute()
    {
        return "A" . str_pad($this->id, 5, "0", STR_PAD_LEFT);
    }

    public function getFullNameAttribute(){
        return $this->first_name . " ". $this->last_name;
    }
    public function getAgeAttribute(){
        return Carbon::parse($this->birthday)->age . " years old";
    }
}
