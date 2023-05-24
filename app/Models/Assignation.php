<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @mixin IdeHelperAssignation
 */
class Assignation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'infirmier_id',
        'docteur_id',
        'date_assignation',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
        'infirmier_id' => 'integer',
        'docteur_id' => 'integer',
        'date_assignation' => 'datetime',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function infirmier(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function docteur(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
