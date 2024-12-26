<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\DataTables\CountryDataTable;
use App\DataTables\StateDataTable;
use App\DataTables\DistrictDataTable;
use App\DataTables\PanchayatDataTable;
use App\Models\District;
use App\Models\Panchayat;
use App\Models\State;

class LocationController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        //
    }

    // COUNTRY

    public function countryindex( CountryDataTable $dataTable ) {
        try {
            // return view( 'pages.masters.country' );
            return $dataTable->render( 'pages.masters.location.country' );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function countrystore( Request $request ) {
        try {
            $countryname = $request->countryName;
            $countryID = $request->countryID;

            if ( !$countryID ) {
                Country::create( [
                    'country_name'=>$countryname,
                ] );

                return response()->json( [ 'success', 'country created successfully', 201 ] );
            } else {
                $country = Country::find( $countryID );

                $country->update( [
                    'country_name'=>$countryname,
                ] );

                return response()->json( [ 'success', 'country Updated successfully', 200 ] );
            }

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating country', 400 ] );
            Log::error( $th );
        }
    }

    // STATE

    public function stateindex( StateDataTable $dataTable ) {
        try {
            $countries = Country::all();
            return $dataTable->render( 'pages.masters.location.state', compact( 'countries' ) );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function statestore( Request $request ) {
        try {
            $stateName = $request->stateName;
            $stateID = $request->stateID;
            $country = $request->country;

            if ( !$stateID ) {
                State::create( [
                    'state_name'=>$stateName,
                    'country_id'=>$country,
                ] );

                return response()->json( [ 'success', 'State created successfully', 201 ] );
            } else {
                $state = State::find( $stateID );

                $state->update( [
                    'state_name'=>$stateName,
                    'country_id'=>$country,
                ] );

                return response()->json( [ 'success', 'State Updated successfully', 200 ] );
            }

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating country', 400 ] );
            Log::error( $th );
        }
    }

    // DISTRICT

    public function districtindex( DistrictDataTable $dataTable ) {
        try {
            $states = State::all();
            return $dataTable->render( 'pages.masters.location.district', compact( 'states' ) );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function districtstore( Request $request ) {
        try {
            $districtName = $request->districtName;
            $districtID = $request->districtID;
            $state = $request->state;

            $stateid = State::find( $state );

            if ( !$districtID ) {

                District::create( [
                    'country_id'=>$stateid->country_id,
                    'state_id'=>$state,
                    'district_name'=>$districtName,
                ] );

                return response()->json( [ 'success', 'District created successfully', 201 ] );
            } else {
                $district = District::find( $districtID );

                $district->update( [
                    'country_id'=>$stateid->country_id,
                    'state_id'=>$state,
                    'district_name'=>$districtName,
                ] );

                return response()->json( [ 'success', 'District Updated successfully', 200 ] );
            }

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating District', 400 ] );
            Log::error( $th );
        }
    }

    // PANCHAYAT

    public function panchayatindex( PanchayatDataTable $dataTable ) {
        try {
            $districts = District::all();
            return $dataTable->render( 'pages.masters.location.panchayat', compact( 'districts' ) );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function panchayatstore( Request $request ) {
        try {
            $panchayatName = $request->panchayatName;
            $panchayatID = $request->panchayatID;
            $district = $request->district;

            $districtid = District::find( $district );
            $stateid = State::find( $districtid->state_id );

            if ( !$panchayatID ) {

                Panchayat::create( [
                    'country_id'=>$stateid->country_id,
                    'state_id'=>$districtid->state_id,
                    'district_id'=>$district,
                    'panchayat_name'=>$panchayatName,
                ] );

                return response()->json( [ 'success', 'Panchayat created successfully', 201 ] );
            } else {
                $panchayat = Panchayat::find( $panchayatID );

                $panchayat->update( [
                    'country_id'=>$stateid->country_id,
                    'state_id'=>$districtid->state_id,
                    'district_id'=>$district,
                    'panchayat_name'=>$panchayatName,
                ] );

                return response()->json( [ 'success', 'Panchayat Updated successfully', 200 ] );
            }

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating Panchayat', 400 ] );
            Log::error( $th );
        }
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}