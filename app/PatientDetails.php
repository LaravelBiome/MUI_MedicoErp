<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDetails extends Model
{

    //Table name
    protected $table = 'patient_details' ;

  /**
     * testing
     * a details of patient belongs to the patient
     */
    public function patients() {
        return $this->belongsTo('App\Patient');
    }
}
