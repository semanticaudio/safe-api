<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEReverbUserData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEReverbUserData';
    
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

    public function deltas(){
        return $this->hasMany('\App\SAFEReverbDeltas','ID','ID');
    }
    public function deltadeltas(){
        return $this->hasMany('\App\SAFEReverbDeltaDeltas','ID','ID');
    }
    public function audiofeaturedata(){
        return $this->hasMany('\App\SAFEReverbAudioFeatureData','ID','ID');
    }
}
