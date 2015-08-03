<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFECompressorDeltaDeltas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFECompressorDeltaDeltas';
    
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
        return $this->belongsTo('\App\SAFECompressorUserData','ID','ID');
    }

    /**
     * Functions
     *
     */

    public function isProcessed(){
        return ($this->SignalState == 'Processed' ? true : false);
    }
}
