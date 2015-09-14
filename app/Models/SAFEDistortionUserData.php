<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEDistortionUserData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEDistortionUserData';

    protected $hidden = ['usrIP'];
    
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
        return $this->hasMany('\App\SAFEDistortionDeltas','ID','ID');
    }
    public function deltadeltas(){
        return $this->hasMany('\App\SAFEDistortionDeltaDeltas','ID','ID');
    }
    public function audiofeaturedata(){
        return $this->hasMany('\App\SAFEDistortionAudioFeatureData','ID','ID');
    }
}
