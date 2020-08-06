<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    //primary
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true ;

    protected $fillable = [
        'event_title' , 'start_date' , 'end_date'
    ];
}
