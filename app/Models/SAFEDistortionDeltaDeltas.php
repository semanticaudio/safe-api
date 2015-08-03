<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEDistortionDeltaDeltas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEDistortionDeltaDeltas';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relationships
     *
     */
    
    public function userdata(){
        return $this->belongsTo('\App\SAFEDistortionUserData','ID','ID');
    }

    /**
     * Functions
     *
     */

    public function isProcessed(){
        return ($this->SignalState == 'Processed' ? true : false);
    }
}
