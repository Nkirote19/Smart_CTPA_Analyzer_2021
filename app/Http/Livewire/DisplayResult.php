<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prediction;

class DisplayResult extends Component
{
    public $predictions;

    protected $listeners = ['showAnalysis' => 'getAnalysis'];

    public function mount()
    {
        $this->predictions = collect();
    }

    public function render()
    {
        return view('livewire.display-result');
    }

    public function getAnalysis($prediction_id){

        $this->predictions = \App\Models\Prediction::select('acute_and_chronic_pe','central_pe','chronic_pe','flow_artifact','indeterminate','leftsided_pe','negative_exam_for_pe','pe_present_on_image','qa_contrast','qa_motion','rightsided_pe','rv_lv_ratio_gte_1','rv_lv_ratio_lt_1','true_filling_defect_not_pe')->where('prediction_id', $prediction_id)->get()->first()->toArray();
        arsort( $this->predictions);
    }
}

