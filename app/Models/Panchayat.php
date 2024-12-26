<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panchayat extends Model {
    protected $fillable = [ 'country_id', 'state_id', 'district_id', 'panchayat_name' ];

    public function country() {
        return $this->belongsTo( Country::class, 'country_id' );
    }

    public function state() {
        return $this->belongsTo( State::class, 'state_id' );
    }

    public function district() {
        return $this->belongsTo( District::class, 'district_id' );
    }
}