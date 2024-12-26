<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model {
    protected $fillable = [ 'dealer_name', 'dealer_code', 'designation', 'department', 'mobile_number', 'dealer_address', 'dealer_dob', 'dealer_doj', 'dealer_dol', 'branch_id', 'reports_to', 'role_id', 'country_id', 'state_id', 'district_id', 'base_district_id', 'home_district_id', 'dealer_login_id', 'dealer_login_password', 'dealer_status', 'dealer_active' ];

    public function country() {
        return $this->belongsTo( Country::class, 'country_id' );
    }

    public function state() {
        return $this->belongsTo( State::class, 'state_id' );
    }

    public function district() {
        return $this->belongsTo( District::class, 'district_id' );
    }

    public function designation() {
        return $this->belongsTo( Designation::class, 'designation' );
    }

    public function branch() {
        return $this->belongsTo( Branch::class, 'branch_id' );
    }
}