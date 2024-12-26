<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $fillable = [ 'emp_name', 'emp_code', 'designation', 'department', 'mobile_number', 'emp_address', 'emp_dob', 'emp_doj', 'emp_dol', 'branch_id', 'reports_to', 'role_id', 'country_id', 'state_id', 'district_id', 'base_district_id', 'home_district_id', 'emp_login_id', 'emp_login_password', 'emp_status', 'emp_active' ];

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