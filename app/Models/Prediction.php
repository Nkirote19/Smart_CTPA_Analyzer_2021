<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prediction
 * 
 * @property int $prediction_id
 * @property int $patient_id
 * @property float $acute_and_chronic_pe
 * @property float $central_pe
 * @property float $chronic_pe
 * @property float $flow_artifact
 * @property float $indeterminate
 * @property float $leftsided_pe
 * @property float $negative_exam_for_pe
 * @property float $pe_present_on_image
 * @property float $qa_contrast
 * @property float $qa_motion
 * @property float $rightsided_pe
 * @property float $rv_lv_ratio_gte_1
 * @property float $rv_lv_ratio_lt_1
 * @property float $true_filling_defect_not_pe
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PatientScanAnalysisModel $patient_scan_analysis_model
 *
 * @package App\Models
 */
class Prediction extends Model
{
	protected $table = 'predictions';
	protected $primaryKey = 'prediction_id';

	protected $casts = [
		'patient_id' => 'int',
		'acute_and_chronic_pe' => 'float',
		'central_pe' => 'float',
		'chronic_pe' => 'float',
		'flow_artifact' => 'float',
		'indeterminate' => 'float',
		'leftsided_pe' => 'float',
		'negative_exam_for_pe' => 'float',
		'pe_present_on_image' => 'float',
		'qa_contrast' => 'float',
		'qa_motion' => 'float',
		'rightsided_pe' => 'float',
		'rv_lv_ratio_gte_1' => 'float',
		'rv_lv_ratio_lt_1' => 'float',
		'true_filling_defect_not_pe' => 'float'
	];

	protected $fillable = [
		'patient_id',
		'acute_and_chronic_pe',
		'central_pe',
		'chronic_pe',
		'flow_artifact',
		'indeterminate',
		'leftsided_pe',
		'negative_exam_for_pe',
		'pe_present_on_image',
		'qa_contrast',
		'qa_motion',
		'rightsided_pe',
		'rv_lv_ratio_gte_1',
		'rv_lv_ratio_lt_1',
		'true_filling_defect_not_pe'
	];

	public function patient_scan_analysis_model()
	{
		return $this->belongsTo(PatientScanAnalysisModel::class, 'patient_id');
	}
}
