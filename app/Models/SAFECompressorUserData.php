<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFECompressorUserData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFECompressorUserData';

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
        return $this->hasMany('\App\SAFECompressorDeltas','ID','ID');
    }
    public function deltadeltas(){
        return $this->hasMany('\App\SAFECompressorDeltaDeltas','ID','ID');
    }
    public function audiofeaturedata(){
        return $this->hasMany('\App\SAFECompressorAudioFeatureData','ID','ID');
    }
}
