<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model {
    //

    protected $fillable = [ 'state_id', 'country_id', 'district_name' ];

    public function country() {
        return $this->belongsTo( Country::class, 'country_id' );
    }

    public function state() {
        return $this->belongsTo( State::class, 'state_id' );
    }

}