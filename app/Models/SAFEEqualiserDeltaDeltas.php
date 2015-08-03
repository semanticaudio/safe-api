<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEEqualiserDeltaDeltas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEEqualiserDeltaDeltas';
    
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
        return $this->belongsTo('\App\SAFEEqualiserUserData','ID','ID');
    }

    /**
     * Functions
     *
     */

    public function isProcessed(){
        return ($this->SignalState == 'Processed' ? true : false);
    }
}
