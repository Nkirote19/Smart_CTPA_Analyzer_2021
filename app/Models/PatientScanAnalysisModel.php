<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prediction;

/**
 * Class PatientScanAnalysisModel
 * 
 * @property int $patient_id
 * @property string $patient_surname
 * @property string $patient_fname
 * @property string $patient_oname
 * @property bool $patient_gender
 * @property int $patient_age
 * @property float $patient_weight
 * @property string $patient_chiefComplaints
 * @property string $patient_hpi
 * @property string $patient_pastMedicalHistory
 * @property string $patient_familyMedicalHistory
 * @property string $patient_image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Prediction[] $predictions
 *
 * @package App\Models
 */
class PatientScanAnalysisModel extends Model
{
	protected $table = 'patient_details';
	protected $primaryKey = 'patient_id';

	protected $casts = [
		'patient_age' => 'int',
		'patient_weight' => 'float'
	];

	protected $fillable = [
		'patient_surname',
		'patient_fname',
		'patient_oname',
		'patient_gender',
		'patient_age',
		'patient_weight',
		'patient_chiefComplaints',
		'patient_hpi',
		'patient_pastMedicalHistory',
		'patient_familyMedicalHistory',
		'patient_image'
	];

	public function predictions()
	{
		return $this->hasMany(Prediction::class, 'patient_id');
	}
}
