<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
      //Table name
      protected $table = 'patient_lists' ;
      //primary
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true ;


      /**+
       * a patient lsit belongs to the user
       */
      public function user() {
        return $this->belongsTo('App\User');
      }

      /**
       * a patient has details
       */

      public function details() {
          return $this->hasOne('App\PatientDetails');
      }
}

