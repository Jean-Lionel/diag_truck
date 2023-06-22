<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperPrescription
 */
class Prescription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diag_id',
        'med_id',
        'dose',
        'patient_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'diag_id' => 'integer',
        'med_id' => 'integer',
    ];

    public function diag(): BelongsTo
    {
        return $this->belongsTo(Diagnostic::class);
    }

    public function medicament(): BelongsTo
    {
        return $this->belongsTo(Medicament::class , 'med_id');
    }
}
