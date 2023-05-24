<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Assignation
 *
 * @property int $id
 * @property int $patient_id
 * @property int $infirmier_id
 * @property int $docteur_id
 * @property \Illuminate\Support\Carbon $date_assignation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $docteur
 * @property-read \App\Models\User $infirmier
 * @property-read \App\Models\Patient $patient
 * @method static \Database\Factories\AssignationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereDateAssignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereDocteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereInfirmierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAssignation {}
}

namespace App\Models{
/**
 * App\Models\Diagnostic
 *
 * @property int $id
 * @property int $patient_id
 * @property int $docteur_id
 * @property string $contenu
 * @property \Illuminate\Support\Carbon $date_diag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $docteur
 * @property-read \App\Models\Patient $patient
 * @method static \Database\Factories\DiagnosticFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereDateDiag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereDocteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diagnostic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDiagnostic {}
}

namespace App\Models{
/**
 * App\Models\Medicament
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $type_medicament_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TypeMedicament $typeMedicament
 * @method static \Database\Factories\MedicamentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament query()
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereTypeMedicamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Medicament whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMedicament {}
}

namespace App\Models{
/**
 * App\Models\Patient
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon $birthday
 * @property string|null $patient_id
 * @property string|null $address
 * @property string|null $sexe
 * @property string|null $phone
 * @property string|null $chef_famille
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PatientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereChefFamille($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPatient {}
}

namespace App\Models{
/**
 * App\Models\Prescription
 *
 * @property int $id
 * @property int $diag_id
 * @property int $med_id
 * @property string $dose
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Diagnostic $diag
 * @property-read \App\Models\Medicament $med
 * @method static \Database\Factories\PrescriptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereDiagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereDose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereMedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prescription whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPrescription {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRole {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string|null $name
 * @property int $status
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperService {}
}

namespace App\Models{
/**
 * App\Models\TypeMedicament
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TypeMedicamentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeMedicament whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTypeMedicament {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $lastName
 * @property string|null $phone
 * @property string|null $sexe
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $role_name
 * @property string|null $specialite_Docteur
 * @property string|null $qualification_infirmier
 * @property int|null $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQualificationInfirmier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSpecialiteDocteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

