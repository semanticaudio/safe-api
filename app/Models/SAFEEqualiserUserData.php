<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAFEEqualiserUserData extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'SAFEEqualiserUserData';
    
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
        return $this->hasMany('\App\SAFEEqualiserDeltas','ID','ID');
    }
    public function deltadeltas(){
        return $this->hasMany('\App\SAFEEqualiserDeltaDeltas','ID','ID');
    }
    public function audiofeaturedata(){
        return $this->hasMany('\App\SAFEEqualiserAudioFeatureData','ID','ID');
    }
}
