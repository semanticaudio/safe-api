<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEReverbAudioFeatureData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEReverbAudioFeatureData';
    
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
        return $this->belongsTo('\App\SAFEReverbUserData','ID','ID');
    }

    /**
     * Functions
     *
     */

    public function isProcessed(){
        return ($this->SignalState == 'processed' ? true : false);
    }
}
